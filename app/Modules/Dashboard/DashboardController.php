<?php

namespace App\Modules\Dashboard;

use Illuminate\Http\Request;

class DashboardController
{
    public function index(Request $request)
    {
        return view('dashboard.index', ['title' => 'Dashboard']);
    }
}
