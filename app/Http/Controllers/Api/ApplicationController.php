<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use App\Services\ApplicationService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ApplicationController extends Controller
{
    private ApplicationService $applicationService;

    public function __construct(ApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        $app = $this->applicationService->index();
        return ApplicationResource::collection($app);
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
     * @return ApplicationResource
     */
    public function change_state(Application $application): ApplicationResource
    {
        $app = $this->applicationService->change_state($application);
        return ApplicationResource::make($app);
    }
}
