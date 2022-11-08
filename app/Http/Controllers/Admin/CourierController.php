<?php

namespace EasyShop\Http\Controllers\Admin;

use EasyShop\Courier;
use EasyShop\Http\Controllers\Controller;
use Illuminate\Http\Request;
use EasyShop\Http\Requests;
use Datatables;

class CourierController extends Controller
{
    public function get()
    {
        return view('admin.courier.index');
    }

    public function getDataTable()
    {
        $select_array = array('id', 'name', 'api_token', 'email', 'phone');
        $couriers = Courier::select($select_array)->get();

        return Datatables::of($couriers)
            ->addColumn('Action', '<div class="text-center">
                                <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                                    href="{{{ URL::to(\'admin/couriers/\' . $id  ) }}}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="margin-left-5 tooltips" data-container="body" data-placement="top" data-original-title="Избриши"
                                    href="{{{ URL::to(\'admin/couriers/delete/\' . $id  ) }}}">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                                </div>
                                ')
            ->removeColumn('id')
            ->make();
    }

    public function show($id)
    {
        $courier = Courier::find($id);
        return view('admin.courier.create', compact('courier'));
    }

    public function create()
    {
        $courier = new Courier();
        return view('admin.courier.create', compact('courier'));
    }

    public function store(Request $request)
    {
        if(!is_null($request->get('courier_id'))) {
            $courier = Courier::find($request->get('courier_id'));
        } else {
            $courier = new Courier();
        }
        $courier->name = $request->get('name');
        $courier->api_token = $request->get('api_token');
        $courier->email = $request->get('email');
        $courier->phone = $request->get('phone');
        $courier->note = $request->get('note');
        $courier->save();

        return redirect()->route('admin.couriers');
    }

    public function delete($id)
    {
        $courier = Courier::find($id);
        $courier->delete();
        return redirect()->back();
    }
}
