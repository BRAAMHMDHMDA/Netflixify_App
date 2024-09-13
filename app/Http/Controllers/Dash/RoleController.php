<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','show']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-show', ['only' => ['show']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::where('guard_name', 'admin')
                        ->with('permissions')
                        ->withCount('users')
                        ->paginate(6);

        return view('dashboard.roles.index',[
            'roles' => $roles
        ]);
    }

    public function create(): View
    {
        $permissions = Permission::get();
        return view('dashboard.roles.create',compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('dashboard.roles.index')
            ->with('success','Role Created Successfully');
    }

    public function show(Request $request, Role $role) : JsonResponse | View
    {
        $role->load('permissions')->loadCount('users');
        return $request->ajax() ? Admin::Datatable($role->users()) : view('dashboard.roles.show',compact('role'));
    }

    public function edit(Role $role): View
    {
        $permissions = Permission::get();
        $role['permissions'] = $role->permissions()->pluck('id')->toArray();

        return view('dashboard.roles.edit',compact('role','permissions'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permissions'));

        return redirect()->route('dashboard.roles.index')
            ->with('success','Role Updated Successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('dashboard.roles.index')
            ->with('success','Role deleted successfully');
    }
}
