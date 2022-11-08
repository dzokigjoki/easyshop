<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;
use EasyShop\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use EasyShop\Http\Requests;
use EasyShop\Services\ManufacturerService;
use EasyShop\Models\Manufacturers;
use Datatables;
use EasyShop\Repositories\ManufacturerRepository\ManufacturerRepositoryInterface;
use EasyShop\Services\PageService;
use EasyShop\Http\Requests\AdminManufacturerRequest;
use File;


class ManufacturerController extends Controller
{
    /**
     * @var $manufacturerRepository
     */
    protected $manufacturerRepository;

    /**
     * @var $pageService
     */
    protected $pageService;
    protected $manufacturerService;

    /**
     * @param ManufacturerRepositoryInterface $articleRepository
     */
    public function __construct(ManufacturerRepositoryInterface $manufacturerRepository, PageService $pageService, ManufacturerService $manufacturerService)
    {
        $this->manufacturerService= $manufacturerService;
        $this->manufacturerRepository = $manufacturerRepository;
        $this->pageService = $pageService;
    }

    public function getIndex()
    {
        $pageData = $this->pageService->getManufacturerListPageData();
        return view('admin.manufacturer.index', compact('pageData', 'breadcrumbs', 'products'));
    }


    public function show($id = NULL)
    {
        $pageData = $this->pageService->getManufacturerShowPageData();

        $data['pageData'] = $pageData;

        $data['manufacturer'] = new Manufacturers();
        $data['manufacturer_id'] = 0;

        if (!is_null($id)) {
            $data['manufacturer'] = $this->manufacturerRepository->getById($id);
            if (is_null($data['manufacturer'])) {
                return redirect()->route('admin.manufacturer')->withError('Производителот не постои!');
            }
            $data['manufacturer_id'] = $id;
        }

        return view('admin.manufacturer.manufacturer', $data);
    }


    public function store(\EasyShop\Http\Requests\AdminManufacturerRequest $request)
    {
        $id = $request->input('manufacturer_id');

        if (empty($id)) {
            $manufacturers = new Manufacturers();
        } else {
            $manufacturers = Manufacturers::where('id', $id)->first();
        }

        $manufacturers->name = $request->input('name');
        $manufacturers->description = $request->input('description');
        $manufacturers->save();
        // Upload image
        if (!File::isDirectory(public_path() . '/uploads/manufacturers/' . $manufacturers->id)) {
            File::makeDirectory(public_path() . '/uploads/manufacturers/' . $manufacturers->id, 0775);
        }

        $file = Input::file('image');
        if (!empty($file)) {
            $data = $this->manufacturerService->saveMainImage($file, $manufacturers->id);
            $manufacturers->image = $data['filename'];
            $manufacturers->save();
        }
        return redirect()->route('admin.manufacturers')->withSuccess('Успешно додаден производител.');
    }

    public function delete($id)
    {
        if (empty($id)) {
            return redirect()->route('admin.manufacturers')->withError('Нема производител со овој id.');
        } else {
            $manufacturers = Manufacturers::where('id', $id)->delete();
            return redirect()->route('admin.manufacturers')->withSuccess('Успешно избришан производител.');
        }
    }

    public function getManufacturerDatatable()
    {

        $products = Manufacturers::select('id', 'name', 'description');

        return Datatables::of($products)
            ->addColumn('Action', '<div class="text-center">
                                    <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                                        href="{{{ URL::to(\'admin/manufacturers/show/\' . $id  ) }}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <!--<a class="margin-left-5 tooltips" data-container="body" data-placement="top" data-original-title="Избриши"
                                        href="{{{ URL::to(\'admin/manufacturers/delete/\' . $id  ) }}}">
                                        <i class="fa fa-trash-o"></i>
                                    </a>-->
                                    </div>
                                    ')
            ->make();
    }
}
