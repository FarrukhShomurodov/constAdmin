<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioRequest;
use App\Models\Portfolio;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

;

class PortfolioController extends Controller
{
    /**
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.portfolio.create');
    }

    /**
     * @param PortfolioRequest $request
     * @return RedirectResponse
     */
    public function store(PortfolioRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        if($validated){
            $imagePath = $request->file('image')->store('images', 'public');
            Portfolio::query()->create([
                "title" => $validated['title'],
                "image" => $imagePath
            ]);
        }
        return redirect()->route('admin.portfolio.index');
    }

    /**
     * @param Portfolio $portfolio
     * @return View|Application|Factory
     */
    public function edit(Portfolio $portfolio): View|Application|Factory
    {
        return view('admin.portfolio.update', compact('portfolio'));
    }

    /**
     * @param Portfolio $portfolio
     * @param PortfolioRequest $request
     * @return RedirectResponse
     */
    public function update(Portfolio $portfolio, PortfolioRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $imagePath = '';
        if($validated){
            if(Storage::disk('public')->exists($portfolio->image)){
                Storage::disk('public')->delete($portfolio->image);
                $imagePath = $request->file('image')->store('images', 'public');
            }
            $portfolio->update([
                "title" => $validated['title'],
                "image" => $imagePath
            ]);
        }
        return redirect()->route('admin.portfolio.index');
    }

    /**
     * @param Portfolio $portfolio
     * @return RedirectResponse
     */
    public function destroy(Portfolio $portfolio): RedirectResponse
    {
        if(Storage::disk('public')->exists($portfolio->image)){
            Storage::disk('public')->delete($portfolio->image);
        }
        $portfolio->delete();
        return redirect()->route('admin.portfolio.index');
    }
}
