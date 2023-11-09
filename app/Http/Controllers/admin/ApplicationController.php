<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Services\ApplicationService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ApplicationController extends Controller
{
    private ApplicationService $applicationService;

    public function __construct(ApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;
    }

    /**
     * @return View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $applications = Application::all();
        return view('admin.app.applications', compact('applications'));
    }

    /**
     * @param Application $application
     * @return RedirectResponse
     */
    public function change_state(Application $application): RedirectResponse
    {
        $applications = $this->applicationService->change_state($application);
        return redirect()->route('admin.show_done_app', compact('applications'));
    }

    /**
     * @return View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function show_done_app(): View|\Illuminate\Foundation\Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $applications = $this->applicationService->show_done_app();
        return view('admin.app.done_applications', compact('applications'));
    }

}
