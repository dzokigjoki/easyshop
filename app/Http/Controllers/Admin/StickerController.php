<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\Product;
use EasyShop\Models\Sticker;
use Illuminate\Support\Facades\View;
use Datatables;
use Intervention\Image\Facades\Image;
use File;
use EasyShop\Services\CategoryService;
use Exception;

class StickerController extends Controller
{
    /**
     * @var $categoryService
     */
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $data['stickers'] = Sticker::all();
        return View::make('admin.sticker.index', $data);
    }

    public function create()
    {
        $categires_html =  $this->categoryService->htmlOptionsFromArrayForArticles($this->categoryService->loadCategoryTreeData(), array());
        return View::make('admin.sticker.sticker', compact('categires_html'));
    }

    public function delete($id)
    {
        $sticker = Sticker::find($id);

        $products = Product::where('sticker_id', $id)->get();
        if (count($products) > 0) {
            foreach ($products as $product) {
                $product->sticker_id = null;
                $product->save();
            }
        }

        $sticker->delete();

        return response()->json(['message' => 'Стикерот е успешно избришан!']);
    }

    public function store(Request $request)
    {
        if ($request->has('sticker_id')) {
            $sticker = Sticker::find($request->get('sticker_id'));
        } else {
            $sticker = new Sticker();
        }
        $sticker->name = !!$request->has('name') ? $request->get('name') : null;
        $sticker->form = !!$request->has('form') ? $request->get('form') : null;

        if (!!$request->has('color')) {
            $sticker->color = $request->get('color');
        }
        $sticker->position = !!$request->has('position') ? $request->get('position') : null;
        $sticker->content = !!$request->has('content') ? $request->get('content') : null;

        try {
            $sticker->save();
        } catch (Exception $e) {
            return response()->json(['message' => 0]);
        }

        if (!is_null($request->file('image')) && is_object($request->file('image'))) {
            $imageName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $sticker->image = $imageName;

            if (!File::isDirectory(public_path() . DIRECTORY_SEPARATOR . 'uploads')) {
                File::makeDirectory(public_path()  . DIRECTORY_SEPARATOR .  'uploads', 0775, true);
            }

            if (!File::isDirectory(public_path()  . DIRECTORY_SEPARATOR .  'uploads/stickers')) {
                File::makeDirectory(public_path()  . DIRECTORY_SEPARATOR .  'uploads/stickers', 0775, true);
            }

            if (!File::isDirectory(public_path()  . DIRECTORY_SEPARATOR .  'uploads/stickers' . DIRECTORY_SEPARATOR .  $sticker->id)) {
                File::makeDirectory(public_path()  . DIRECTORY_SEPARATOR .  'uploads/stickers' . DIRECTORY_SEPARATOR .  $sticker->id, 0775, true);
            }

            $path = public_path('/uploads/stickers' . DIRECTORY_SEPARATOR . $sticker->id . DIRECTORY_SEPARATOR . $imageName);
            $image = Image::make($request->file('image')->getRealPath());
            $image->save($path);
            $sticker->save();
        }

        return redirect()->route('admin.stickers');
    }

    public function list()
    {
        $stickers = Sticker::select('id', 'name', 'form', 'color', 'position', 'content', 'image')->get();

        return Datatables::of($stickers)
            ->editColumn('content', function ($sticker) {
                if (!is_null($sticker->content)) {
                    return trans('global.' . $sticker->content);
                } else {
                    return 'N/A';
                }
            })
            ->editColumn('form', function ($sticker) {
                if (!is_null($sticker->form)) {
                    return trans('global.' . $sticker->form);
                } else {
                    return 'N/A';
                }
            })
            ->editColumn('name', function ($sticker) {
                if (!is_null($sticker->name)) {
                    return $sticker->name;
                } else {
                    return 'N/A';
                }
            })
            ->editColumn('position', function ($sticker) {
                if (!is_null($sticker->position)) {
                    return trans('global.' . $sticker->position);
                } else {
                    return 'N/A';
                }
            })
            ->editColumn('color', function ($sticker) {
                if ($sticker->color) {
                    return "<div class='text-center'><span style='background-color: $sticker->color' class='label label-sm'>$sticker->color</span></div>";
                } else {
                    return "<div class='text-center'>N/A</div>";
                }
            })
            ->editColumn('image', function ($sticker) {
                if ($sticker->image) {
                    $label = 'label-success';
                    $text = 'Да';
                } else {
                    $label = 'label-danger';
                    $text = 'Не';
                }
                return "<div class='text-center'><span class='label label-sm $label'>$text</span></div>";
            })
            ->addColumn('action', function ($sticker) {
                return '<div class="text-center">
                <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                    href="/admin/stickers/' . $sticker->id . '">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="margin-left-5 tooltips" data-sticker-delete data-id="' . $sticker->id . '" data-container="body" data-placement="top" data-original-title="Избриши">
                    <i class="fa fa-trash-o"></i>
                </a> 
                </div>';
            })
            ->removeColumn('id')
            ->make();
    }

    public function edit($id)
    {
        $sticker = Sticker::find($id);
        return view('admin.sticker.edit_sticker', compact('sticker'));
    }

    public function getProductsDatatable()
    {
        $global_price = \EasyShop\Models\AdminSettings::getField('prices');
        $sifra = \EasyShop\Models\AdminSettings::getField('sifra');
        $in_stock_filter = Input::get('inStock');
        $category = Input::get('category');
        $select_array = array('products.id');

        if ($sifra) {
            $select_array[] = 'unit_code';
        }
        $select_array[] = 'products.title as nona';
        $select_array[] = 'discount';
        $select_array[] = 'products.price_retail_1';
        $select_array[] = 'products.total_stock';
        $select_array[] = 'products.active as active';

        $products = Product::select($select_array)
            ->leftJoin('manufacturers', 'manufacturers.id', '=', 'products.manufacturer_id')
            ->leftJoin('discounts', 'discounts.product_id', '=', 'products.id');

        if ($in_stock_filter == 'no_stock') {
            $products->where('total_stock', '=', 0);
        } elseif ($in_stock_filter == 'in_stock') {
            $products->where('total_stock', '>', 0);
        }

        if ($category > 0) {
            $products->join('product_category', 'product_category.product_id', '=', 'products.id');
            $products->where('product_category.category_id', $category);
        }
        $products = $products->distinct()->get();
        $i = 0;
        foreach ($products as $key => $value) {
            if (!empty($value->discount)) {
                $disc = json_decode($value->discount);
                if (strtotime(date('Y-m-d H:i:s')) < strtotime($disc->end)) {
                    unset($products[$i]);
                }
            } else {
                unset($products[$i]->discount);
            }
            $i++;
        }
        return Datatables::of($products)
            ->editColumn('active', '<div class="text-center"><span class="label label-sm {{{ $active ? \'label-success\' : \'label-danger\' }}}"> {{{ $active ? \'Да\' : \'Не\' }}} </span></div>')
            ->addColumn('Action', '<div class="text-center">
                                    <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                                        href="{{{ URL::to(\'admin/articles/show/\' . $id  ) }}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="margin-left-5 tooltips" data-container="body" data-placement="top" data-original-title="Избриши"
                                        href="{{{ URL::to(\'admin/articles/delete/\' . $id  ) }}}">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    </div>
                                    ')
            ->removeColumn('discount')
            ->make();
    }
}
