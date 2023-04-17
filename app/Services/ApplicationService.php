<?php

namespace App\Services;

use App\Models\Application;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ApplicationService
{
    /**
     * @return Collection|array
     */
    public function index(): Collection|array
    {
        return Application::query()->get();
    }

    /**
     * @param $validated
     * @return Model|Builder
     */
    public function store($validated): Model|Builder
    {
        $app = Application::query()->create($validated);
        return $app->refresh();
    }

    /**
     * @param Application $application
     * @return Application|null
     */
    public function change_state(Application $application): ?Application
    {
        $application->update([
            "state" => 1
        ]);
        return $application->fresh();
    }
}
