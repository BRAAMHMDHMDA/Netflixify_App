<?php

namespace App\Livewire\Website\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormRegisterComponent extends Component
{
    #[Validate('required|string|min:3')]
    public $name;

    #[Validate('required|string|email|unique:users')]
    public $email;

    #[Validate('required|min:5')]
    public $password;

    #[Validate('nullable')]
    public $remember;

    public function submit()
    {
        $data = $this->validate();
        $data['password'] = Hash::make($this->password);
        $user = User::create($data);
        Auth::guard('web')->login($user);

        return to_route('home');
    }

    public function render()
    {
        return view('website.auth.form-register-component');
    }
}
