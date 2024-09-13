<?php

namespace App\Livewire\Dashboard\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class  DashboardLoginComponent extends Component
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
        if (!Auth::guard('admin')->attempt($this->only('email', 'password'), $this->remember)) {
//            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
        return to_route('dashboard.home');
    }
    public function render()
    {
        return view('dashboard.auth.dashboard-login-component');
    }
}
