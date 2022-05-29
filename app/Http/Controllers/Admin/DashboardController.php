<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index($indicator_period = 2)
    {
        return view('admin.dashboard');
    }
}
