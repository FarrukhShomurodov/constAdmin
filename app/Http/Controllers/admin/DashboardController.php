<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class DashboardController extends Controller
{
    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $app = \App\Models\Application::query();
        $count = $app->count();
        $doneAppCount = $app->where("state", "=",1)->count();
        return view('admin.dashboard',["application" => $count, "doneApp" => $doneAppCount]);
    }
}
