<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','show']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        return $request->ajax() ? User::Datatable() : view('dashboard.users.index');
    }

    public function create()
    {
        return view('dashboard.users.create');
    }


    public function store(UserRequest $request)
    {
        User::storeImage($request);
        $request['password'] = Hash::make($request['password']);
        User::create($request->all());

        return Redirect::route('dashboard.users.index')
            ->with('success', 'User created Successfully!');
    }


    public function edit(User $user)
    {
        return view('dashboard.users.edit',[
            'user' => $user,
        ]);
    }


    public function update(UserRequest $request, User $user)
    {
        User::updateImage($request, $user->image_path);
        $user->update($request->all());

        return Redirect::route('dashboard.users.index')
            ->with('success', 'User updated!');
    }


    public function destroy(User $user)
    {

        $user->delete();
        User::deleteImage($user->image_path);

        return Redirect::route('dashboard.users.index')
            ->with('success', 'User Deleted Successfully!');
    }
}
