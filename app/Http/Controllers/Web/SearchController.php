<?php

namespace App\Http\Controllers\Web;

use App\Models\Article;
use App\Models\Domain;
use App\Models\Event;
use App\Models\People;
use App\Models\Research;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 1;
        $current_page = $request->page ?? 1;
        $peoples = People::search($request->search)->paginate($pagination);
        $articles = Article::search($request->search)->paginate($pagination);
        $researches = Research::search($request->search)->paginate($pagination);
        $events = Event::search($request->search)->paginate($pagination);
        $domains = Domain::search($request->search)->paginate($pagination);
        $total_page = max(1,
            ceil($articles->total() / $pagination),
            ceil($peoples->total() / $pagination),
            ceil($researches->total() / $pagination),
            ceil($events->total() / $pagination),
            ceil($domains->total() / $pagination)
        );
        return view('web.searchs.index', compact('peoples', 'articles', 'domains', 'researches',
            'events', 'current_page', 'total_page'));
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
