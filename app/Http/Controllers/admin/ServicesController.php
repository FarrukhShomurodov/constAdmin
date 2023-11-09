<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    /**
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.services.create');
    }

    /**
     * @param ServiceRequest $request
     * @return RedirectResponse
     */
    public function store(ServiceRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        if ($validated) {
            $imagePath = $request->file('image')->store('images', 'public');
            Service::query()->create([
                "title" => $validated['title'],
                "description" => $validated['description'],
                "image" => $imagePath
            ]);
        }
        return redirect()->route('admin.services.index');
    }

    /**
     * @param Service $service
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function edit(Service $service): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.services.update', compact('service'));
    }

    /**
     * @param Service $service
     * @param ServiceRequest $request
     * @return RedirectResponse
     */
    public function update(Service $service, ServiceRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $imagePath = '';
        if ($validated) {
            if (Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
                $imagePath = $request->file('image')->store('images', 'public');
            }
            $service->update([
                "title" => $validated['title'],
                "description" => $validated['description'],
                "image" => $imagePath
            ]);
        }
        return redirect()->route('admin.services.index');
    }

    /**
     * @param Service $service
     * @return RedirectResponse
     */
    public function destroy(Service $service): RedirectResponse
    {
        if (Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();
        return redirect()->route('admin.services.index');
    }
}
