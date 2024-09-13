<?php

namespace App\Models;

use App\Traits\HasImage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Yajra\DataTables\Facades\DataTables;

class Admin extends Authenticatable
{
    use Notifiable, HasImage, HasRoles;

    public static string $imageDisk = 'media';
    public static string $imageFolder = '/admins';

    protected $fillable = [
        'name',
        'email',
        'username',
        'phone_number',
        'image_path',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//    protected function getDefaultGuardName(): string { return 'admin'; }
    public function scopeWhereRole(Builder $query, $role_name): Builder
    {
        return $query->whereHas('roles', function ($q) use ($role_name){
            return $q->whereIn('name', (array)$role_name);
        });
    }
    public function scopeWhereRoleNot(Builder $query, $role_name): Builder
    {
        return $query->whereHas('roles', function ($q) use ($role_name){
            return $q->whereNotIn('name', (array)$role_name);
        });
    }
    public static function Datatable($query=null): JsonResponse
    {
        if ($query== null){
//            $query = Admin::whereRoleNot('super_admin')->query();
            $query = Admin::query();
        }
        return  Datatables::of($query)
            ->addIndexColumn()
            ->editColumn('name', function (Admin $admin) {
                return view('dashboard.admins.DT._name-col', compact('admin'));
            })
            ->editColumn('status', function (Admin $admin) {
                if ($admin->status == 'active'){
                    return sprintf('<div class="badge badge-success fw-bold">%s</div>',  ucwords($admin->status) );
                }else return sprintf('<div class="badge badge-secondary fw-bold">%s</div>', ucwords($admin->status) );
            })
            ->editColumn('created_at', function (Admin $admin) {
                return $admin->created_at->format('d M Y, h:i a');
            })
            ->addColumn('actions',  function (Admin $admin) {
                return view('dashboard.admins.DT._actions-col', ['admin' => $admin])->render();
            })
            ->addColumn('role',  function (Admin $admin) {
                    return view('dashboard.admins.DT._roles-col', ['roles' => $admin->roles]);
            })
            ->rawColumns(['actions','name', 'status', 'role'])
            ->make(true);
    }

}
