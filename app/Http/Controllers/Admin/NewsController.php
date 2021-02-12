<?php

namespace App\Http\Controllers\Admin;

use App\News;
use App\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:10',
            'short_text' => 'required|min:10',
            'text' => 'required|min:10',
            'image' => 'required|file|mimes:png,jpg,jpeg',
            'categories' => 'required|array',
        ]);

        $image_path = $request->file('image')->store('/public/images');
        $data['image'] = str_replace('public/', '/storage/', $image_path);

        $news = News::create($data);

        $news->categories()->attach($request->categories);

        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();

        return view('admin.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'name' => 'required|min:10',
            'short_text' => 'required|min:10',
            'text' => 'required|min:10',
            'image' => 'required|file|mimes:png,jpg,jpeg',
            'categories' => 'required|array',
        ]);

        $image_path = $request->file('image')->store('/public/images');
        $data['image'] = str_replace('public/', '/storage/', $image_path);

        $news->update($data);

        $news->categories()->sync($request->categories);

        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        Storage::delete(
            str_replace('/storage', 'public', $news->image)
        );

        $news->categories()->sync([]);

        $news->delete();

        return redirect()->route('admin.news.index');
    }
}
