<?php

namespace App\Livewire\Dashboard\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardLogoutComponent extends Component
{
    public function logout()
    {
        Auth::guard('admin')->logout();

        session()->forget('guard.admin');
        session()->regenerateToken();

        return to_route('dashboard.login');
    }
    public function render()
    {
        return view('dashboard.auth.dashboard-logout-component');
    }
}
