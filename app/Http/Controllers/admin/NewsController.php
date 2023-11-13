<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    /**
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function create(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.news.create');
    }

    /**
     * @param NewsRequest $request
     * @return RedirectResponse
     */
    public function store(NewsRequest $request): RedirectResponse
    {
        News::query()->create($request->validated());
        return redirect()->route('admin.news.index');
    }

    /**
     * @param News $news
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function edit(News $news): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.news.update', compact('news'));
    }

    /**
     * @param News $news
     * @param NewsRequest $request
     * @return RedirectResponse
     */
    public function update(News $news, NewsRequest $request): RedirectResponse
    {
        $news->update($request->validated());
        return redirect()->route('admin.news.index');
    }

    /**
     * @param News $news
     * @return RedirectResponse
     */
    public function destroy(News $news): RedirectResponse
    {
        $news->delete();
        return redirect()->route('admin.news.index');
    }
}
