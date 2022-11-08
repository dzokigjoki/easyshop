<?php

namespace EasyShop\Http\Controllers\Admin;

use EasyShop\Http\Requests\AdminBannerRequest;
use EasyShop\Models\Banner;
use EasyShop\Models\BannerCategory;
use EasyShop\Models\BannerTableCategory;
use Illuminate\Http\Request;
use EasyShop\Services\BannerService;
use EasyShop\Repositories\BannerRepository\BannerRepositoryInterface;
use EasyShop\Repositories\CategoryRepository\CategoryRepositoryInterface;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Services\PageService;
use EasyShop\Services\ImageService;
use File;
use Image;
use Datatables;
use Auth;
use EasyShop\Helpers\BannerHelper;
use URL;

class BannerController extends Controller
{
    protected $bannerRepository;
    protected $pageService;
    protected $imageService;
    protected $bannerService;
    protected $categoryRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        BannerRepositoryInterface $bannerRepository,
        PageService $pageService,
        ImageService $imageService,
        BannerService $bannerService
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->bannerRepository = $bannerRepository;
        $this->pageService = $pageService;
        $this->imageService = $imageService;
        $this->bannerService = $bannerService;
    }
    public function index()
    {
        return view('admin.banners.index');
    }


    /**
     * open view for adding banners
     *
     * @param  int  $id
     * @return view
     */
    public function show()
    {
        $categories  = BannerCategory::all();
        return view('admin.banners.add', compact('categories'));
    }

    /**
     * open view for editting banners
     *
     * @param  int  $id
     * @return view
     */
    public function edit($id)
    {
        $banner = $this->bannerRepository->getById($id);
        $categories  = BannerCategory::all();
        return view('admin.banners.add', compact('banner', 'categories'));
    }

    /**
     * Create Datatable for Banners
     *
     * @return Datatables
     */
    public function getBannersAjax()
    {
        $banners = $this->bannerRepository->getAll();
        return Datatables::of($banners)
            ->editColumn('active', '<div class="text-center"><span class="label label-sm {{{ $active ? \'label-success\' : \'label-danger\' }}}"> {{{ $active ? \'Да\' : \'Не\' }}} </span></div>')
            ->editColumn('image', function ($banner) {
                if (isset($banner->image)) {
                    if ($banner->type == 'web') {
                        $image_path = '/uploads/banners/' . $banner->id . '/';
                        $bannerString = "<img width=150 src=" . "$image_path" . "lg_$banner->image" . ">";
                    } else {
                        $image_path = '/uploads/banners/' . $banner->id . '/';
                        $bannerString = "<img width=150 src=" . "$image_path" . "mob_$banner->image" . ">";
                    }
                    return $bannerString;
                }
                return '/';
            })
            ->editColumn('mobile_image', function ($banner) {
                if (isset($banner->mobile_image) && $banner->type == "web") {
                    $image_path = '/uploads/banners/' . $banner->id . '/';
                    $bannerString = "<img width=100 src=" . "$image_path" . "md_$banner->mobile_image" . ">";
                    return $bannerString;
                }
                return '/';
            })
            ->editColumn('url', function ($banner) {
                if (isset($banner->url)) {
                    return $banner->url;
                }
                return '/';
            })
            ->addColumn('Action', function ($banner) {
                return '<div class="text-center">
                <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                    href="/admin/banners/' . $banner->id . '">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="margin-left-5 tooltips" data-banner-delete data-id="' . $banner->id . '" data-container="body" data-placement="top" data-original-title="Избриши">
                    <i class="fa fa-trash-o"></i>
                </a> 
                </div>';
            })
            ->addColumn('Category', function ($banner) {
                if (!is_null($banner->categories)) {
                    $category = $banner->categories->title;
                    return $category;
                }
                return '/';
            })
            ->make(true);
    }

    /**
     * Get the next free position for a new banner/editing
     *
     * @param  int  $categoryId,$bannerId,$type
     * @return int
     */
    public function getBannerPositionByCategory($categoryId, $bannerId, $type)
    {
        $categoryTitle = BannerCategory::find($categoryId)->title;
        $nextPosition = BannerHelper::getNextPosition($categoryTitle, $type);

        if ($bannerId != -1) {
            $banner = $this->bannerRepository->getById($bannerId);
            if ($banner->banner_category_id == (int) $categoryId) {
                $bannerPosition = $banner->position;
                return response()->json([
                    'bannerPosition' => $bannerPosition
                ]);
            }
        }

        $bannerPosition = $nextPosition + 1;
        return response()->json([
            'bannerPosition' => $bannerPosition
        ]);
    }

    public function getBannerDimensions($categoryId)
    {
        $category = BannerCategory::find($categoryId);
        $image_config = config( 'clients.' . config( 'app.client') . '.' . str_slug($category->title) . 'BannerMaxWidth');
        $webMainImage = $image_config['lg']['width'] . ' x ' . $image_config['lg']['height'];
        $webMobileImage = $image_config['md']['width'] . ' x ' . $image_config['md']['height'];
        $mobileImage = $image_config['mob']['width'] . ' x ' . $image_config['mob']['height'];
        return response()->json([
            'webMainImage' => $webMainImage,
            'webMobileImage' => $webMobileImage,
            'mobileImage' => $mobileImage
        ]);
    }

    /**
     * @description
     * Store banner
     */
    public function store(Request $request)
    {

        $type = $request['type'];
        $id = $request->input('banner_id');
        if (empty($id)) {
            $banner = new Banner();
        } else {
            $banner = $this->bannerRepository->getById($id);
            $type = $banner->type;

            if (!is_null($banner->image) && !empty($request->file('image'))) {

                if (file_exists(public_path() . DIRECTORY_SEPARATOR . 'uploads/banners/' . $banner->id . DIRECTORY_SEPARATOR . 'lg_' . $banner->image)) {
                    File::delete(public_path() . DIRECTORY_SEPARATOR . 'uploads/banners/' . $banner->id . DIRECTORY_SEPARATOR . 'lg_' . $banner->image);
                }

                if (public_path() . DIRECTORY_SEPARATOR . 'uploads/banners/' . $banner->id . DIRECTORY_SEPARATOR . 'md_' . $banner->image) {
                    File::delete(public_path() . DIRECTORY_SEPARATOR . 'uploads/banners/' . $banner->id . DIRECTORY_SEPARATOR . 'md_' . $banner->image);
                }
            }


            if (!is_null($banner->mobile_image) && !empty($request->file('mobile_image'))) {

                if (file_exists(public_path() . DIRECTORY_SEPARATOR . 'uploads/banners/' . $banner->id . DIRECTORY_SEPARATOR . 'md_' . $banner->mobile_image)) {
                    File::delete(public_path() . DIRECTORY_SEPARATOR . 'uploads/banners/' . $banner->id . DIRECTORY_SEPARATOR . 'md_' . $banner->mobile_image);
                }
            }

            if (is_null($banner)) {
                return redirect()->route('admin.banners');
            }
        }

        $banner->type = $type;
        $banner->title = trim($request->input('title'));
        $banner->url = trim($request->input('url'));
        $banner->short_description = trim($request->input('short_description'));
        $banner->description = trim($request->input('description'));
        $banner->active = $request->input('active', 0);
        $banner->position = (int) $request->input('position', 1);
        $banner->save();

        // CATEGORY NAME DA STAM NA INPUTOT
        $banner->banner_category_id = $request->input('category');

        if (is_null($banner->id)) {
            BannerHelper::changePositionOnCreate($banner->id, $banner->position, $banner->banner_category_id);
            $banner->position = $banner->position;
            $banner->save();
        } else {
            BannerHelper::changePositionOnUpdate($banner->id, $banner->position, $banner->banner_category_id);
            $banner->save();
        }

        $file = $request->file('image');
        if (!empty($file)) {
            if (!File::isDirectory(public_path() . '/uploads/banners/' . $banner->id)) {
                File::makeDirectory(public_path() . '/uploads/banners/' . $banner->id, 0775);
            }

            $category_banner = BannerCategory::find($banner->banner_category_id);
            $data = $this->bannerService->saveMainImage($file, $banner->id, $category_banner->title, $type);
            $banner->image = $data['filename'];
            $banner->save();
        }
        if ($type === 'web') {
            $fileMobile = $request->file('mobile_image');
            if (!empty($fileMobile)) {
                if (!File::isDirectory(public_path() . '/uploads/banners/' . $banner->id)) {
                    File::makeDirectory(public_path() . '/uploads/banners/' . $banner->id, 0775);
                }

                $category_banner = BannerCategory::find($banner->banner_category_id);
                $data = $this->bannerService->saveMobileImage($fileMobile, $banner->id, $category_banner->title, $type);

                $banner->mobile_image = $data['filename'];
                $banner->save();
            }
        }

        return redirect()->route('admin.banners');
    }

    /**
     * @description
     * Delete banner
     */
    public function getDelete($id = NULL)
    {

        $banner = $this->bannerRepository->getById($id);
        BannerHelper::changePositionOnDelete($banner);
        $banner->delete();

        if (File::exists(public_path() . '/uploads/banners/' . $id)) {
            File::deleteDirectory(public_path() . '/uploads/banners/' . $id);
        }
        return redirect()->route('admin.banners');
    }
}
