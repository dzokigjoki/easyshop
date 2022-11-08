<?php

namespace EasyShop\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use EasyShop\Http\Controllers\Controller;
use Datatables;
use EasyShop\Models\User;
use EasyShop\Models\City;
use EasyShop\Models\Country;
use EasyShop\Models\Document;
use EasyShop\PartnerReview;
use EasyShop\PartnerStock;
use EasyShop\Models\Settings;
use Session;


class CustomersController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        return view('admin.customers.index');
    }

    public function getCreate()
    {
        $data['client'] = new User();
        $data['client']->country_id = 1;
        $data['client']->country_id_shipping = 1;
        $data['user_id'] = 0;
        $data['city'] = City::all();
        $data['country'] = Country::all();
        $data['operators'] = User::join('assigned_roles', 'users.id', '=', 'assigned_roles.user_id')->where('assigned_roles.role_id', 2)->select('users.*')->get();


        return view('admin.customers.create-edit', $data);
    }

    public function getShow($user_id)
    {
        $data['client'] = User::where('id', $user_id)->first();
        if (empty($data['client']->country_id)) {
            $data['client']->country_id = 1;
        }
        if (empty($data['client']->country_id_shipping)) {
            $data['client']->country_id_shipping = 1;
        }
        $data['user_id'] = $user_id;
        $data['city'] = City::all();
        $data['country'] = Country::all();
        $data['operators'] = User::join('assigned_roles', 'users.id', '=', 'assigned_roles.user_id')->where('assigned_roles.role_id', 2)->select('users.*')->get();
        return view('admin.customers.create-edit', $data);
    }

    public function store(\EasyShop\Http\Requests\AdminCustomerRequest $request)
    {
        $user_id = $request->get('user_id');

        if (in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS)) {

            $checkNewUser = User::where('phone', $request->get('phone'))->first();
            if($user_id != "0"){
                $checkEditUser = User::where('id', $user_id)->first();
            }
            if ($checkNewUser) {
                if($checkNewUser->phone != $checkEditUser->phone){

                    return redirect()->back()->withError("Телефонскиот број е веќе искористен за креирање друг клиент");
                }
            }
            if(in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS)){
                $checkNewUser = User::where('phone2', $request->get('phone2'))->first();
                if ($checkNewUser && ($request->get('phone2') != "" || $request->get('phone2') != null)) {
                    if($checkNewUser->phone2 != $checkEditUser->phone2){

                    return redirect()->back()->withError("Телефонскиот број 2 е веќе искористен за креирање друг клиент");
                    }
                }
            }
        }else{
            $checkNewUser = User::where('email', $request->get('email'))->first();
            if ($checkNewUser) {

                return redirect()->back()->withError("Е поштата е веќе искористена за креирање друг клиент");
            }
        }
        if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
            if($request->get('loyalty_code') != NULL || $request->get('loyalty_code') != ''){
                $editUser = User::where('email', $request->get('email'))->first();
                $checkNewUser = User::where('loyalty_code', $request->get('loyalty_code'))->first();
                if ($checkNewUser != null && $editUser != null && $editUser->loyalty_code != $request->get('loyalty_code')) {
                    return redirect()->back()->withError("Таа лојалти шифра е веќе искористена за креирање друг клиент");
                }
            }
        }

        if (!empty($user_id)) {
            $user = User::where('id', $user_id)->first();
        } else {
            $user = new User();
            $password = rand(1000, 9999);
            $user->password = bcrypt($password);
        }
        
        $email = $request->get('email');
        if ($email == "") {
            $email = md5(time())."@email.com";
        }
        $user->email = $email;
        $user->phone = $request->get('phone');
        if(in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS)){
            $user->phone2 = $request->get('phone2');
        }
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->address = $request->get('address');
        $user->company = $request->get('company');
        $user->gender = $request->get('gender');
        $user->type = $request->get('type');
        $user->nacin_plakanje = $request->get('nacin_plakanje');
        $user->cenovna_grupa = $request->get('cenovna_grupa');
        $user->address = $request->get('address');
        $user->address_shiping = $request->get('address_shiping');
        $user->danocen_broj = $request->get('danocen_broj');
        $user->website = $request->get('website');
        $user->aktiven = 0;

        $user->confirmed = 1;
        // billing address
        $user->city_id = $request->get('city_id');
        $user->city_other = $request->get('city_other');
        $user->zip_other = $request->get('zip_other');
        $user->country_id = $request->get('country_id');
        $user->country_other = $request->get('country_other');
        // shiping address
        $user->city_id_shipping = $request->get('city_id_shipping');
        $user->city_other_shipping = $request->get('city_other_shipping');
        $user->zip_other_shipping = $request->get('zip_other_shipping');
        $user->country_id_shipping = $request->get('country_id_shipping');
        $user->country_other_shipping = $request->get('country_other_shipping');
        if(in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS)){
            if(!auth()->user()->canDo('admin')){
                $user->created_by = $request->get('operator') != "" ? $request->get('operator') : auth()->user()->id;
            }
            else{
                $user->created_by = $request->get('operator') != "" ? $request->get('operator') : null;        
            }
        }
        else{
            $user->created_by = $request->get('operator') != "" ? $request->get('operator') : null;
        }


        $user->note = $request->get('note');

        $user->partner = !is_null($request->get('partner')) ? $request->get('partner') : 0;

        if(config('app.client') == Settings::CLIENT_NATURATHERAPYSHOP){
            if($request->get('loyalty_code') != null && $request->get('loyalty_code') != ""){
                $user->loyalty_code = $request->get('loyalty_code');
            }
            else{
                $user->loyalty_code = null;
            }
            if($request->get('loyalty_points') != null && $request->get('loyalty_points') != ""){
                $user->points = $request->get('loyalty_points');
            }
        }


        if ($request->has('aktiven'))
            $user->aktiven = 1;

        if ($user->country_id == 1) {
            $user->city_other = '';
            $user->zip_other = '';
        }

        $user->save();
        if (empty($user_id)) {
            /*    Mail::send('emails.newCustumer', ['user' => $user], function ($m) use ($user) {
                $m->from('hello@eashshop.com');
                $m->to($user->email, $user->first_name)->subject('Your new user credentionals');
            });*/
        }

        return redirect()->route('admin.customers');
    }

    public function getCustomers(Request $request)
    {
        $search = $request->search;
        $search = trim($search["value"]);

        $select_array = array(
            'users.id', 
            'first_name', 
            'last_name', 
            'email', 
            'company', 
            'type', 
            'phone',
            'cenovna_grupa', 
            'cities.city_name', 
            'aktiven', 
            'city_other', 
            'users.country_id'
        );
        if(in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS)){
            $inserted = array('phone2');
            array_splice( $select_array, 7, 0, $inserted );
        }
        if(config('app.client') == \EasyShop\Models\Settings::CLIENT_NATURATHERAPYSHOP){
            array_push($select_array, 'points');
            array_push($select_array, 'loyalty_code');
        }

        $users = User::select($select_array)->leftJoin('cities', 'cities.id', '=', 'users.city_id');
        if (in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS)) {
            if (!auth()->user()->canDo('admin')) {
                $users->where(function($query){
                    $query->where('users.created_by', auth()->id())->orWhere('users.created_by', null);
                });
            }
        }
        return Datatables::of($users)
         
            // ->editColumn('first_name', '<div style="white-space: nowrap;">{{{ $first_name}}} {{{$last_name }}}</div>')
            // ->filterColumn('name', 'whereRaw', 
            //     "CONCAT(users.first_name, ' ' ,users.last_name) like ? ", ["%$search%"])
            ->editColumn('aktiven', '<div class="text-center"><span class="label label-sm {{{ $aktiven ? \'label-info\' : \'label-default\' }}}"> {{{ $aktiven ? \'Да\' : \'Не\' }}} </span></div>')
            ->editColumn('city_name', '{{{ $country_id == 1 ? $city_name : $city_other }}}')
            ->addColumn('Action', '<div class="text-center">
                                    <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                                        href="{{{ URL::to(\'admin/customers/show/\' . $id  ) }}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="margin-left-5 tooltips" data-container="body" data-placement="top" data-original-title="Избриши"
                                        href="{{{ URL::to(\'admin/customers/delete/\' . $id  ) }}}">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    </div>
                                    ')
            ->editColumn('type', '@if($type=="person") личност @endif @if($type=="company") фирма @endif')
            ->editColumn('cenovna_grupa', '@if($cenovna_grupa == "price_retail_1") малопродажна 1 @endif @if($cenovna_grupa == "price_retail_2") малопродажна 2 @endif @if($cenovna_grupa == "price_wholesale_1") големопродажна 1 @endif @if($cenovna_grupa == "price_wholesale_2") големопродажна 2 @endif @if($cenovna_grupa == "price_wholesale_3") големопродажна 3 @endif')
            // ->removeColumn('id')
            ->removeColumn('city_other')
            ->removeColumn('country_id')
            ->make();
    }


    public function partnerReviewIndex()
    {
        $partners = User::where('partner', 1)->get();
        return view('admin.partner_review.index', compact('partners'));
    }



    public function getPartnerStock(Request $request)
    {
        $partnerId = $request->input('partner');
        $records = PartnerStock::with('product')->where('user_id', $partnerId)->where('quantity', '>', 0)->get();
        return $records;
    }

    public function delete($id)
    {

        $user = User::find($id);
        if ($user && $user->id != 1) {
            $user->email = $user->email . ' - ' . Carbon::now()->toDateTimeString();
            $user->save();
            $user->delete();
        }
        return redirect()->back();
    }


    public function getPartnerReview(Request $request)
    {
        $date = \Carbon\Carbon::parse($request->input('date'))->format('Y-m-d');
        $partnerId = $request->input('partner');
        $records = PartnerReview::with('product')->where('user_id', $partnerId)->where('reviewed_at', $date)->get();
        if (count($records) > 0) {
            $data['records'] = $records;
            $document = Document::where('user_id', $partnerId)->where('type', 'faktura')->whereDate('document_date', '=', $date)->first();
            $data['document'] = $document->id;
        } else {
            $records = PartnerStock::with('product')->where('user_id', $partnerId)->where('quantity', '>', 0)->get();
            foreach ($records as $record) {
                $record->difference = 0;
                $record->new = true;
                $record->after_review_quantity = $record->quantity;
            }

            $data['records'] = $records;
            $data['document'] = null;
        }
        return $data;
    }





    public function checkCustomerNumberShow(Request $request)
    {

        return view('admin.customers.check-customer-number');
    }

    public function checkCustomerNumber(Request $request)
    {


        $user = User::where('phone', $request->get('phone'))->first();

        if(in_array(config('app.client'), \EasyShop\Models\Settings::CLIENT_NATURATHERAPY_SHOPS)){
            if (!$user) {
                $user = User::where('phone2', $request->get('phone'))->first();
            }

            if (!$user) {
                $user = User::where('phone2', $request->get('phone'))->first();
                Session::flash('empty', "Не постои креиран клиент со овој број!");
                return redirect()->back();
            }
        }

        
        $created_by = User::where('id', $user->created_by )->first();

        $data['user'] = $user;
        $data['created_by'] = $created_by;

       

        if($user){
            Session::flash('data', $data);
            return redirect()->back();
        }else{
            Session::flash('empty', "Не постои креиран клиент со овој број!");
            return redirect()->back();
        }
        
    }



    public function createPartnerReview(Request $request)
    {
        $products = $request->input('array');
        foreach ($products as $item) {
            if ($item['difference'] > 0) {
                $record = new PartnerReview();
                $record->user_id = $request->input('partner');
                $record->reviewed_at = \Carbon\Carbon::parse($request->input('reviewed_at'))->format('Y-m-d');
                $record->quantity = $item['quantity'];
                $record->product_id = $item['product_id'];
                $record->after_review_quantity = $item['after_review_quantity'];
                $record->difference = $item['difference'];
                $record->save();
                $stockRecord = PartnerStock::where('product_id', $record->product_id)->where('user_id', $record->user_id)->first();
                $stockRecord->quantity = $record->after_review_quantity;
                $stockRecord->save();
            }
        }
    }
    public function searchCustomers(Request $request){
        $search = $request->search;
        $search_full = explode(' ', $search); // If searched by first and last name
        if(count($search_full) < 2){
            $users = User::select("id", "first_name", 'last_name', 'created_by')
                ->where('first_name', 'like' , "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->get();
        }
        else{
            $users = User::select("id", "first_name", 'last_name', 'created_by')
                ->where('first_name', 'like' , "%{$search_full[0]}%")
                ->where('last_name', 'like', "%{$search_full[1]}%")
                ->get();
        }
        $response = array();
        foreach($users as $user){
            $response[] = array(
                'id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'created_by' => $user->created_by
            );
        }
        return response($response);
    }
}
