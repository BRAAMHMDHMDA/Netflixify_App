<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashLayout extends Component
{
    public string $title;

    public function __construct($title = null)
    {
        $this->title = $title ?? config('app.name');
    }

    public function render(): View
    {
        return view('dashboard.layout.app');
    }
}
