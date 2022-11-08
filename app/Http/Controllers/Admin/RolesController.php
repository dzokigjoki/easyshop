<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\Role;
use EasyShop\Models\Permission;
use EasyShop\Models\PermissionRoles;
use View;
use Datatables;

class RolesController extends Controller
{
    public function index()
    {
    	return View::make('admin.roles.showTable');
    }

    public function create()
    {
    	$data['role_id'] = 0;
    	$return_perm = [];
    	$perm = Permission::all();
    	foreach ($perm as $key => $value) {
    		$return_perm[$value['menu']][] = $value; 
    	}
    	$data['permissions'] = $return_perm;
    	return View::make('admin.roles.create',$data);
    }

    public function show($id)
    {
    	$data['role_id'] = $id;
    	$data['role'] = Role::find($id);
    	$return_perm = [];
    	$perm = Permission::all();
    	$data['rolePerm_array'] = [];
    	$rolePerm = PermissionRoles::where('role_id',$id)->get();
    	foreach ($rolePerm as $value) {
    		$data['rolePerm_array'][] = $value['permission_id'];
    	}
    	foreach ($perm as $key => $value) {
    		$return_perm[$value['menu']][] = $value; 
    	}
    	$data['permissions'] = $return_perm;
    	return View::make('admin.roles.create',$data);
    }

    public function store(Request $req)
    {
    	
    	$role_id 		= $req->get('role_id');
    	$permissions 	= $req->get('permissions');

    	if(!empty($role_id)){
    		$role = Role::find($role_id);
            PermissionRoles::where('role_id',$role_id)->delete();
        }
    	else
    		$role = new Role();

    	$role->name = $req->get('role_name');
    	$role->save();

    	foreach ($permissions as $value) {
    		$perm 					= new PermissionRoles();
    		$perm->role_id 			= $role->id;
    		$perm->permission_id	= $value;
    		$perm->save();
    	}

    	return redirect()->route('admin.roles');

    }

    public function datatableRoles(Request $req)
    {
    	$results = Role::select('id','name','created_at');
    	return Datatables::of($results)    		
    		->addColumn('akcija','<div class="text-center">
                                    <a class="margin-right-10 tooltips" data-container="body" data-placement="top" data-original-title="Едитирај"
                                        href="{{{ URL::to(\'admin/roles/show/\' . $id  ) }}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    </div>
                                    ')
            ->removeColumn('id')
            ->make();
    }
}
