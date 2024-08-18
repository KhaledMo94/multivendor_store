<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Carbon\Carbon;


class Dashboard extends Controller
{
    public function index() : View {
        $title = 'Starter Page';
        return view('dashboard.index' , [
            'title'                     =>$title ?? Null,
        ]);
    }
}
