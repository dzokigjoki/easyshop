<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use EasyShop\Http\Requests\AdminWarehouseRequest;
use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\Warehouse;
use EasyShop\Models\City;
use EasyShop\Models\Country;
use Datatables;

class WarehousesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        return view('admin.warehouses.index');
    }

    public function create()
    {
        $data['city'] = City::all();
        $data['country'] = Country::all();
        $data['warehouse_id'] = 0;
        $data['data'] = new Warehouse();
        $data['data']->country_id = 1;
        return view('admin.warehouses.create',$data);
    }

    public function edit($id)
    {
        $data['city'] = City::all();
        $data['country'] = Country::all();
        $data['data'] = Warehouse::where('id',$id)->first();
        $data['warehouse_id'] = $id;
        return view('admin.warehouses.create',$data);
    }

    public function store(AdminWarehouseRequest $req)
    {
        $id = $req->get('warehouse_id');
        if(!empty($id))
            $wh = Warehouse::where('id',$id)->first();
        else
            $wh = new Warehouse();
        
        $wh->title = $req->get('title');
        $wh->city_id = $req->get('city_id');
        $wh->city_other = $req->get('city_other');
        $wh->country_id = $req->get('country_id');
        $wh->country_other = $req->get('country_other');
        $wh->priority =  $req->get('priority');
        $wh->save();
        return redirect("admin/warehouses");
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIspratnici()
    {
        return view('admin.warehouses.ispratnici');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPriemnici()
    {
        return view('admin.warehouses.priemnici');
    }

    public function getWarehouses()
    {
        $supp = Warehouse::select('warehouses.id','title','city_name','country_name','city_other','warehouses.country_id','priority')
            ->join('cities','cities.id','=','warehouses.city_id')
            ->join('countries','countries.id','=','warehouses.country_id')
            ->get();

        return Datatables::of($supp)
            ->addColumn('Akcija','<div class="text-center">
                                    <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                                        href="{{{ URL::to(\'admin/warehouses/edit/\' . $id  ) }}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                 <!--   <a class="margin-left-5 tooltips" data-container="body" data-placement="top" data-original-title="Избриши"
                                        href="{{{ URL::to(\'admin/warehouses/delete/\' . $id  ) }}}">
                                        <i class="fa fa-trash-o"></i>
                                    </a> -->
                                    </div>
                                    ')
            ->editColumn('city_name','@if($country_id > 1) {{{  $city_other  }}} @else {{{ $city_name }}} @endif')
            ->removeColumn('city_other')
            ->removeColumn('country_id')
            ->removeColumn('id')
            ->make();
    }
}
