<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class DashboardBreadcrumb extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public function __construct($title)
    {
        $this->title = $title;
    
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.dashboard-breadcrumb');
    }
}
