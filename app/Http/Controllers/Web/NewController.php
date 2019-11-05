<?php

namespace App\Http\Controllers\Web;

use App\Models\Article;
use App\Models\Carousel;
use App\Models\Category;
use Illuminate\Http\Request;

class NewController extends Controller
{

    public function index(Request $request)
    {
        $articles = Article::getPinTop(Article::with('categories')->ofCategory($request->c), null)->translate(app()->getLocale());
        $carousels = Carousel::where([
            ['type', '=', 'new'],
            ['status', '=', 'A']
        ])->ordered()->get()->translate(app()->getLocale());
        $categories = Category::where('type', 'new')->get()->translate(app()->getLocale());
        return view('web.news.index', compact('articles', 'carousels', 'categories'));
    }

    public function detail(Article $article)
    {
        $article = $article->translate(app()->getLocale());
        $related_articles = Article::where('id', '!=', $article->id)
            ->orderBy('created_at')->take(4)->get()->translate(app()->getLocale());;
        return view('web.news.detail', compact('article', 'related_articles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
