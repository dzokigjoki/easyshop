<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\User;
use EasyShop\Models\Manufacturers;
use EasyShop\Models\Services;
use EasyShop\Models\DocumentItems;
use EasyShop\Models\Document;
use EasyShop\Models\Warehouse;
use Auth;
use Datatables;
use Response;

class ServiceController extends Controller
{
    public function index()
    {
        $data['servicers'] = User::leftJoin('assigned_roles','assigned_roles.user_id','=','users.id')->where('role_id',1)->select('users.id','first_name','last_name','user_id')->get();
        $data['manufacturers'] = Manufacturers::all();
        $data['warehouses'] = Warehouse::all();

        return view('admin.service.index',$data);
    }

    public function create(Request $request)
    {
        $data = [];
        $data['service_id'] = 0;
        $data['service'] = new Services();
        $data['servicers'] = User::leftJoin('assigned_roles', 'assigned_roles.user_id', '=', 'users.id')
            ->where('role_id', 1)
            ->select('users.id', 'first_name', 'last_name', 'user_id')
            ->get();
        $admin_ids = [];
        foreach ($data['servicers'] as $key => $value) {
            $admin_ids[] = $value->user_id;
        }
        $services = new Services();
        $services->warehouse_id = Auth::user()->warehouse_id;
    	$data['users'] = User::whereNotIn('id',$admin_ids)->get();
        $data['current_employee'] = Auth::user()->first_name.' '.Auth::user()->last_name;
    	$data['manufacturers'] = Manufacturers::all();
        $service_number = Services::where('created_at', '>=', date('Y-01-01 00:00:00'))
            ->where('created_at','<=',date('Y-m-d H:i:s'))
            ->where('warehouse_id',$services->warehouse_id)
            ->count();
//        $service_number = $service_number + 1;
        $data['warehouses'] = Warehouse::all();
        $data['service_document_number'] = sprintf('%02d', $services->warehouse_id ).'-'.sprintf('%05d', $service_number + 1).'/'.date('y');



        return view('admin.service.create',$data);
    }
    public function updateServiceNumber(Request $request){
        $services = new Services();
        $services->warehouse_id = $request->input('number');
        $service_number = Services::where('created_at', '>=', date('Y-01-01 00:00:00'))
            ->where('created_at','<=',date('Y-m-d H:i:s'))
            ->where('warehouse_id',$services->warehouse_id)
            ->count();
//        $service_number = $service_number + 1;
        $new_service_document_number = sprintf('%02d', $services->warehouse_id ).'-'.sprintf('%05d', $service_number + 1).'/'.date('y');
        return response()->json([
            'updatedServiceNumber' =>  $new_service_document_number
        ]);
    }
    public function updatePhoneNumber(Request $request){
        $servicer_id = $request->input('sid');
//        $servicers_phone = User::leftJoin('assigned_roles', 'assigned_roles.user_id', '=', 'users.id')
//            ->where('role_id', $servicer_id)
//            ->pluck('phone');
        $servicers_phone = User::where('id','=',$servicer_id)->pluck('phone');
//        $servicers_phone = substr($servicers_phone,1);
        return response()->json([
            'servicerPhone' => $servicers_phone
        ]);
    }
    public function show($service_id)
    {
        $data = [];
        $data['service_id'] = $service_id;
        $data['servicers'] = User::leftJoin('assigned_roles','assigned_roles.user_id','=','users.id')->where('role_id',1)->select('users.id','first_name','last_name','user_id')->get();
        $admin_ids = [];
        foreach ($data['servicers'] as $key => $value) {
            $admin_ids[] = $value->user_id;
        }
        $data['users'] = User::whereNotIn('id',$admin_ids)->get();
        $service = Services::where('services.id',$service_id)->first();
        $data['service'] = $service;
        $current_employee = User::where('id',$service->accepted_from)->first();
        $data['current_employee'] = $current_employee->first_name.' '.$current_employee->last_name;
        $data['manufacturers'] = Manufacturers::all();
        $data['products'] = DocumentItems::where('document_id',$service->order_id)->get();
        $total = 0;
        foreach ($data['products'] as $key => $value) {
            $total = $total + $value->sum_vat;
        }
        $data['total'] = $total;
        $data['warehouses'] = Warehouse::all();
        return view('admin.service.create',$data);
    }

    public function store(Request $req)
    {

        $service_id = $req->get('service_id');
        if(!empty($service_id))
            $services = Services::where('id',$service_id)->first();
        else
            $services = new Services();
        
        $services->client_id        = $req->get('client');
        $services->accepted_from    = Auth::user()->id;
        $services->servicer         = $req->get('servicer');
        $services->contact_phone    = $req->get('contact_phone');
        $services->model            = $req->get('model');
        $services->serial_number    = $req->get('serial_num');
        $services->known_problems   = $req->get('known_issues');
        $services->problems         = $req->get('issues'); 
        $services->reclamation      = $req->get('complaint');
        $services->comment          = $req->get('comment');
        $services->tezina           = 1;
        $services->servis_status    = $req->get('status');
        $services->manufacturer     = $req->get('manufacturer');     
        $services->used_parts	    = $req->get('used_parts');
        $services->pass_code		= $req->get('pass_code'); 
        $services->contacted	    = $req->get('contacted');
        $services->pass_code        = $req->get('pass_code');
        $services->warehouse_id     = $req->get('warehouse_id');

        if(empty($services->warehouse_id))
            $services->warehouse_id     = Auth::user()->warehouse_id;

        if (empty($service_id)) {
            $service_number = Services::where('created_at', '>=', date('Y-01-01 00:00:00'))
                ->where('created_at','<=',date('Y-m-d H:i:s'))
                ->where('warehouse_id',$services->warehouse_id)
                ->count();

            $services->document_number = sprintf('%02d', $services->warehouse_id ).'-'.sprintf('%05d', $service_number + 1).'/'.date('y');
            
        }

        $date_priem         =   $req->get('date_priem');
        $date_zavrsen       =   $req->get('date_zavrsen');
        $date_podignat      =   $req->get('date_podignat');
        $expected_price     =   $req->get('expected_price');
        $expected_time      =   $req->get('expected_time');
        $date_reklamacija   =   $req->get('date_reklamacija');
        
        if(!empty($date_priem))
            $services->date_priem       = date('Y-m-d',strtotime($date_priem));
        if(!empty($date_zavrsen))
            $services->date_zavrsen     = date('Y-m-d',strtotime($date_zavrsen));
        if(!empty($date_podignat))
            $services->date_podignat    = date('Y-m-d',strtotime($date_podignat));
        if(!empty($expected_price))
            $services->expected_price	= $req->get('expected_price');
        if(!empty($expected_time))
            $services->expected_time    = $req->get('expected_time'); 
        if(!empty($date_reklamacija))
            $services->date_reklamacija = date('Y-m-d',strtotime($date_reklamacija));	

        $services->save();

        return redirect()->route('admin.services');
    }

    public function servicesDatatable(Request $req)
    {
        $services = Services::select(
            'services.id as id',
            'services.document_number',
            'users.first_name',
            'users.last_name',
            'model',
            'serial_number',
            'contact_phone as contact',
            'pass_code',
            'expected_price',
            'problems as defekt',
            'comment',
            'servis_status',
            'services.date_priem',
            'services.date_zavrsen',
            'contacted',
            'date_podignat',
            'servicer')
        ->join('users','users.id','=','services.client_id');


        $serviser_filter = $req->get('servicer');
        $manufacturer_filter = $req->get('manufacturer');
        $status_filter = $req->get('status');
        $warehouse_filter = $req->get('wh');
        $new_from = $req->get('new_from');
        $new_to = $req->get('new_to');

        if(!empty($warehouse_filter))
        {            
            $services = $services->where('services.warehouse_id',$warehouse_filter);
        }
        if(!empty($serviser_filter))
        {
            $services = $services->where('servicer',$serviser_filter);
        }
        if(!empty($manufacturer_filter))
        {            
            $services = $services->where('manufacturer',$manufacturer_filter);
        }
        if(!empty($status_filter))
        {            
            $services = $services->where('servis_status',$status_filter);
        }
        if(!empty($new_from) && !empty($new_to))
        {
            $new_from = date('Y-m-d 00:00:00', strtotime($new_from));
            $new_to = date('Y-m-d 23:59:58', strtotime($new_to));
            $services = $services->where('services.date_priem','>=',$new_from)->where('services.date_priem','<=',$new_to);
        }

        $order = $req->get('order');
        if(!empty($order))
        {
            $order = end($order);
            $column = $order['column'];
            $direction = $order['dir'];

            if($column == 11)
                $services = $services->orderBy('date_podignat',$direction);
            if($column == 9)
                $services = $services->orderBy('date_zavrsen',$direction);
            if($column == 8)
                $services = $services->orderBy('date_priem',$direction);

        }


        $services = $services->get();

        $i = 0;

        foreach ($services as $key => $value) {
            $services[$i]->first_name   = $services[$i]->first_name.'  '.$services[$i]->last_name;
            $serviser = User::where('id',$value->servicer)->select('first_name','last_name')->first();
            $services[$i]->servicer     = !is_null($serviser) ? $serviser->first_name.' '.$serviser->last_name : '';
            //$services[$i]->date_priem   = date('d.m.Y',strtotime($services[$i]->date_priem));
            //$services[$i]->date_zavrsen = date('d.m.Y',strtotime($services[$i]->date_zavrsen));
            //$services[$i]->date_podignat = date('d.m.Y',strtotime($services[$i]->date_podignat));
            if(empty($services[$i]->contacted)) {
                $services[$i]->contacted = 'Не';
            } else {
                $services[$i]->contacted = 'Да';
            }

            $servis_statusi = config( 'clients.' . config( 'app.client') .'.service_status');
            $statusLabel = $servis_statusi[$services[$i]->servis_status]['color'];
            $services[$i]->servis_status= '<span class="label label-sm label-success '.$statusLabel.'">'.$services[$i]->servis_status.'</span>';
            $i = $i + 1;
        }

        $datatable = Datatables::of($services)
            /*        ->editColumn('document_number', '<a href="{{{ URL::to(\'admin/service/show/\' . $id  ) }}}">{{$document_number}}</a>')
                    ->removeColumn('last_name')
                    ->removeColumn('id')*/
                    ->editColumn('contact', '<a style="color:black;" href="tel:{{$contact}}">{{$contact}}</a>')
                    ->addColumn('Action', '<div class="text-center">
                                    <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                                        href="{{{ URL::to(\'admin/service/show/\' . $id  ) }}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Превземи PDF"
                                        href="{{{ URL::to(\'admin/service/pdf/\' . $id  ) }}}">
                                        <i class="fa fa-file"></i>
                                    </a>
                                    </div>
                                    ');

        return $datatable->make(true);
    }

    private function statusOutput($type)
    {
        $array = [

                "primen_na_servis"      =>  'Примен на сервис',
                "se_raboti"             =>  'Се работи',
                "zavrsen"               =>  'Завршен',
                "nemoze_da_se_popravi"  =>  'Неможе да се поправи',
                "odbien"                =>  'Одбиен',
                ];

        return $array[$type];
    }

            /**
     * @return mixed
     */
    public function getDocumentProducts(Request $req,$type)
    {
        $number = $req->get('number');

        $products = [];
        $document_id = Document::where('type',$type)->where('document_number',$number)->pluck('id')->first();
        if(!empty($document_id))
        {
            $products = DocumentItems::where('document_id',$document_id)
                ->select('unit_code','item_name','quantity','sum_vat')
                ->get()
                ->toArray();
        }
        
        $response = ['products' => $products];
        return Response::json($response);
    }

    public function createPdf($id)
    {
        $service = Services::where('services.id',$id)->join('manufacturers','manufacturers.id','=',"services.manufacturer")->first();
        $client  = User::where('id',$service->client_id)->first();
        $accepted_by = User::where('id',$service->accepted_from)->first();
        $serviced_by = User::where('id',$service->servicer)->first();
        $pdf = \PDF::loadView('admin.service.pdf',compact('service','client','accepted_by','serviced_by'));
        return @$pdf->stream();
    }
}
