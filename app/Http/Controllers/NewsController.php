<?php

namespace App\Http\Controllers;

use App\News;
use App\Category;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::when(request()->has('categories'), function ($query) {
            return $query->whereHas('categories', function ($query) {
                $query->whereIn('id', request()->categories);
            });
        })->paginate(9);

        $categories = Category::all();

        return view('news.index', compact('news', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }
}
