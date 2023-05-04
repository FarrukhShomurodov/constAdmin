<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use App\Services\ApplicationService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class ApplicationController extends Controller
{
    private ApplicationService $applicationService;

    public function __construct(ApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|ResponseFactory|\Illuminate\Foundation\Application|Response
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|ResponseFactory|\Illuminate\Foundation\Application|Response
    {
        $app = $this->applicationService->index();
        return response($app);
    }

    /**
     * @param ApplicationRequest $request
     * @return ApplicationResource
     */
    public function store(ApplicationRequest $request): ApplicationResource
    {
        $this->applicationService->store($request->validated());
        return ApplicationResource::make($request);
    }

    /**
     * @param Application $application
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|Response|ResponseFactory
     */
    public function changeState(Application $application): \Illuminate\Contracts\Foundation\Application|ResponseFactory|\Illuminate\Foundation\Application|Response
    {
        $this->applicationService->changeState($application);
        return response(200);
    }
}
