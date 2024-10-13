<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\View\Component;

class AsideDashboard extends Component
{
    public $array;
    public function __construct()
    {
        $this->array = [
            'categories'            =>[
                'name'                      =>'Categories',
                'route_url'                =>route('dashboard.categories.index'),
            ],
            'products'              =>[
                'name'                      =>'Products',
                'route_url'                =>route('dashboard.products.index'),
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $parameter = Request::segment(2);
        return view('components.dashboard.aside-dashboard',compact('parameter'));
    }
}
