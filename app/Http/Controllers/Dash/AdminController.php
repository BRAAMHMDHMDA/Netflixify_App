<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:admin-list|admin-create|admin-edit|admin-delete', ['only' => ['index','show']]);
        $this->middleware('permission:admin-create', ['only' => ['create','store']]);
        $this->middleware('permission:admin-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:admin-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        return $request->ajax() ? Admin::Datatable() : view('dashboard.admins.index');
    }

    public function create()
    {
        return view('dashboard.admins.create',[
            'roles' => Role::all()
        ]);
    }


    public function store(AdminRequest $request)
    {
        Admin::storeImage($request);
        $request['password'] = Hash::make($request['password']);
        $admin = Admin::create($request->all());
        $admin->assignRole($request->input('roles'));

        return Redirect::route('dashboard.admins.index')
            ->with('success', 'Admin created Successfully!');
    }


    public function edit(Admin $admin)
    {
        $admin['roles'] = $admin->roles()->pluck('id')->toArray();

        return view('dashboard.admins.edit',[
            'roles' => Role::all(),
            'admin' => $admin,
        ]);
    }


    public function update(AdminRequest $request, Admin $admin)
    {
        Admin::updateImage($request, $admin->image_path);
        $admin->update($request->all());
        $admin->syncRoles($request->input('roles'));

        return Redirect::route('dashboard.admins.index')
            ->with('success', 'Admin Updated!');
    }


    public function destroy(Admin $admin)
    {
        if ($admin->username === 'super_admin'){
            return Redirect::route('dashboard.admins.index')
                ->with('error', 'This Admin is Super Admin cant delete');
        }

        $admin->delete();
        Admin::deleteImage($admin->image_path);

        return Redirect::route('dashboard.admins.index')
            ->with('success', 'Admin Deleted Successfully!');
    }
}
