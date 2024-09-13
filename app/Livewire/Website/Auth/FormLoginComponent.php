<?php

namespace App\Livewire\Website\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormLoginComponent extends Component
{
    #[Validate('required|string|email')]
    public $email;

    #[Validate('required|min:5')]
    public $password;

    #[Validate('nullable')]
    public $remember;

    public function submit()
    {
        $this->validate();
        if (!Auth::guard('web')->attempt($this->only('email', 'password'), $this->remember)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
                'password' => trans('auth.failed'),
            ]);
        }
        return to_route('home');

    }
    public function render()
    {
        return view('website.auth.form-login-component');
    }
}
