<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Requests\NewsFormRequest;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('release_date', 'desc')->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsFormRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['image'] = $request->file('image')->store('newsImage');
        News::create($validatedData);
        return redirect()->route('news.index')->with('success', 'News added successfully.');
    }

    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        $date = $news->release_date->format('Y-m-d');
        return view('admin.news.edit', compact('news', 'date'));
    }

    public function update(NewsFormRequest $request, News $news)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            Storage::delete($news->image);
            $validatedData['image'] = $request->file('image')->store('newsImage');
        }
        $news->update($validatedData);
        return redirect()->route('news.index')->with('info', 'Details updated successfully.');
    }

    public function destroy(News $news)
    {
        Storage::delete($news->image);
        $news->delete();
        return redirect()->route('news.index')->with('danger', 'News removed successfully.');
    }
}
