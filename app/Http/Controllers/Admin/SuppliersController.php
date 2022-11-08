<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;
use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Services\SupplierService;
use Illuminate\Support\Facades\Input;
use EasyShop\Models\Suppliers;
use EasyShop\Models\City;
use EasyShop\Models\Country;
use File;
use View;
use Datatables;


class SuppliersController extends Controller
{
    /**
     * List all suppliers
     *
     * @return View
     */
    protected $supplierService;
    public function __construct(
        SupplierService $supplierService
    ) {
        $this->supplierService = $supplierService;
    }
    public function getIndex()
    {
        return View::make('admin.suppliers.index');
    }

    /**
     * Create new supplier
     *
     * @param Request $req
     * @return mixed
     */
    public function create(Request $req)
    {
        $data['client'] = new Suppliers();
        $data['client']->country_id = 1;
        $data['supplier_id'] = 0;
        $data['from_url'] = '';
        $data['city'] = City::all();
        $data['country'] = Country::all();
        if ($req->has('from')) {
            $data['from_url'] = $req->get('from');
        }
        return View::make('admin.suppliers.create', $data);
    }

    /**
     * Edit supplier
     *
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $data['supplier_id'] = $id;
        $data['from_url'] = '';
        $data['city'] = City::all();
        $data['country'] = Country::all();
        $data['client'] = Suppliers::where('id', $id)->first();
        if (empty($data['client']->country_id)) {
            $data['client']->country_id = 1;
        }   
        return View::make('admin.suppliers.create', $data);
    }

    public function delete($id)
    {

    }

    /**
     *  Store supplier
     *
     * @param Requests\AdminSuppliersRequest $req
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(\EasyShop\Http\Requests\AdminSuppliersRequest $req)
    {
        $supplier_id = $req->get('supplier_id');
        if (!empty($supplier_id)) {
            $supp = Suppliers::where('id', $supplier_id)->first();
        } else {
            $supp = new Suppliers();
        }

        $supp->contact_lice = $req->get('contact_lice');
        $supp->company_name = $req->get('company_name');
        $supp->edb = $req->get('edb');
        $supp->maticen = $req->get('maticen');
        $supp->ziro_smetka = $req->get('ziro_smetka');
        $supp->banka = $req->get('banka');
        $supp->address = $req->get('address');
        $supp->city_id = $req->get('city_id');
        $supp->city_other = $req->get('city_other');
        $supp->zip_other = $req->get('zip_other');
        $supp->country_id = $req->get('country_id');
        $supp->country_other = $req->get('country_other');
        $supp->phone = $req->get('phone');
        $supp->mobile = $req->get('mobile');
        $supp->email = $req->get('email');
        $supp->web = $req->get('web');
        $supp->note = $req->get('note');
        $supp->type = $req->get('type');

        if($supp->country_id == 62)
        {
            $supp->country_other = '';
            $supp->zip_other = '';
            $supp->city_other = '';
        }

        $supp->save();
        // Upload image
        if (!File::isDirectory(public_path() . '/uploads/suppliers/' . $supp->id)) {
            File::makeDirectory(public_path() . '/uploads/suppliers/' . $supp->id, 0775);
        }

        $file = Input::file('image');

        if (!empty($file)) {

            $data = $this->supplierService->saveMainImage($file, $supp->id);
            $supp->image = $data['filename'];
            $supp->save();
        }
        

        if ($req->has('from_url')) {
            return redirect('admin/document/' . $req->get('from_url') . '/new?from=suppliers');
        }

        return redirect()->route('admin.suppliers');

    }

    /**
     * Get suppliers for DataTables
     *
     * @return mixed
     */
    public function getSuppliers()
    {
        $supp = Suppliers::select('suppliers.id', 'company_name', 'contact_lice', 'city_name', 'country_name', 'phone', 'address', 'type', 'city_other', 'suppliers.country_id')
            ->join('cities', 'cities.id', '=', 'suppliers.city_id')
            ->join('countries', 'countries.id', '=', 'suppliers.country_id')
            ->get();

        return Datatables::of($supp)
            ->addColumn('Akcija', '<div class="text-center">
                                    <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                                        href="{{{ URL::to(\'admin/suppliers/edit/\' . $id  ) }}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                 <!--   <a class="margin-left-5 tooltips" data-container="body" data-placement="top" data-original-title="Избриши"
                                        href="{{{ URL::to(\'admin/suppliers/delete/\' . $id  ) }}}">
                                        <i class="fa fa-trash-o"></i>
                                    </a> -->
                                    </div>
                                    ')
                                    // TODO: ima greska vo city_id sekogas se zapisuva 1
            ->editColumn('city_name', '@if($country_id > 1) {{{  $city_other  }}} @else {{{ $city_name }}} @endif')
            ->editColumn('type', '@if($type == "company") Компанија @else Физичко лице @endif')
            ->removeColumn('city_other')
            ->removeColumn('country_id')
            ->make();
    }
}
