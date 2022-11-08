<?php

namespace EasyShop\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\User;
use EasyShop\Models\City;
use EasyShop\Models\Settings;
use EasyShop\Models\Country;
use EasyShop\Models\Warehouse;
use EasyShop\Models\Role as Roles;
use EasyShop\Models\AssignedRoles;
use Datatables;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.employee.index');
    }

    public function create()
    {
        $data['client'] = new User();
        $data['client']->country_id = 1;
        $data['user_id'] = 0;
        $data['city'] = City::all();
        $data['country'] = Country::all();
        $data['warehouses'] = Warehouse::all();
        $data['roles'] = Roles::all();
        $data['assigned_roles'] = [];
        return view('admin.employee.create', $data);
    }

    public function show($id)
    {
        $data['client'] = User::where('id', $id)->first();
        if (empty($data['client']->country_id)) {
            $data['client']->country_id = 1;
        }
        $data['user_id'] = $id;
        $data['city'] = City::all();
        $data['country'] = Country::all();
        $data['warehouses'] = Warehouse::all();
        $data['roles'] = Roles::all();
        $aRoles = AssignedRoles::where('user_id', $id)->get();
        foreach ($aRoles as $ar) {
            $data['assigned_roles'][] = $ar->role_id;
        }
        return view('admin.employee.create', $data);
    }

    public function store(\EasyShop\Http\Requests\AdminEmployeeRequest $request)
    {

        $user_id = $request->get('user_id');
        $user_email = $request->get('email');

        if ($user_id != 0) {
            $user = User::where('id', $user_id)->first();
            if ($user_email != $user->email) {
                $isRegistered = User::where('email', $user_email)->first();
                if (!is_null($isRegistered)) {
                    return redirect()->back()->with('error', 'The entered email is registered');
                }
            }
        } else {
            $isRegistered = User::where('email', $user_email)->first();
            if (!is_null($isRegistered)) {
                return redirect()->back()->with('error', 'The entered email is registered');
            }
            $user = new User();
            $password = rand(1000, 9999);
            $user->password = bcrypt($password);
        }

        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->address = '';
        $user->company = config( 'app.client');
        $user->gender = $request->get('gender');
        $user->type = 'person';
        $user->nacin_plakanje = 'gotovo';
        $user->cenovna_grupa = 'price_retail_1';
        $user->address_shiping = $request->get('address_shiping');
        $user->danocen_broj = '';
        $user->website = '';
        $user->aktiven = 0;
        $user->confirmed = 1;
        $user->city_id = $request->get('city_id');
        $user->city_other = $request->get('city_other');
        $user->zip_other = $request->get('zip_other');
        $user->country_id = $request->get('country_id');
        $user->country_other = $request->get('country_other');
        $user->warehouse_id = $request->get('warehouse_id');

        if ((in_array(config('app.client'), Settings::CLIENT_NATURATHERAPY_SHOPS)) && $request->has('operator_type')) {
            $user->operator_type = $request->get('operator_type');
        }

        if ($request->has('aktiven'))
            $user->aktiven = 1;

        if ($request->has('password')) {
            $pass = $request->get('password');
            if (!empty($pass))
                $user->password = bcrypt($pass);
        }

        $user->save();
        if (empty($user_id)) {
            $user->attachRole(['id' => 1]);
        }
        if (empty($user_id)) {
            /*    Mail::send('emails.newCustumer', ['user' => $user], function ($m) use ($user) {
                $m->from('hello@eashshop.com');
                $m->to($user->email, $user->first_name)->subject('Your new user credentionals');
            });*/
        }

        if ($request->has('assignedRoles')) {
            $aroles = $request->get('assignedRoles');
            if (empty($user_id)) {
                $user_id = $user->id;
            }
            AssignedRoles::where('user_id', $user_id)->delete();
            foreach ($aroles as $ars) {
                $ar = new AssignedRoles();
                $ar->user_id = (int)$user_id;
                $ar->role_id = (int)$ars;
                $ar->save();
            }
        }

        return redirect()->route('admin.employee');
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

    public function getEmployee()
    {
        $select_array = array('users.id', 'first_name', 'last_name', 'email', 'aktiven');
        $users = User::select($select_array)->join('assigned_roles', 'assigned_roles.user_id', '=', 'users.id')->distinct();


        return Datatables::of($users)
            ->editColumn('aktiven', '<div class="text-center"><span class="label label-sm {{{ $aktiven ? \'label-info\' : \'label-default\' }}}"> {{{ $aktiven ? \'Да\' : \'Не\' }}} </span></div>')
            ->addColumn('Action', '<div class="text-center">
                                    <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                                        href="{{{ URL::to(\'admin/employee/show/\' . $id  ) }}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a class="margin-left-5 tooltips" data-container="body" data-placement="top" data-original-title="Избриши"
                                        href="{{{ URL::to(\'admin/employee/delete/\' . $id  ) }}}">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                    </div>
                                    ')
            ->removeColumn('id')
            ->make();
    }
}
