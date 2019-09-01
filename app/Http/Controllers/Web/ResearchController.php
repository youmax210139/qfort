<?php

namespace App\Http\Controllers\Web;

use App\Models\Domain;
use App\Models\Research;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ResearchController extends Controller
{

    public function index()
    {
        $domains = Domain::all();
        return view('web.researches.index', compact('domains'));
    }

    public function detail(Research $research)
    {
        $related_researches = Research::whereHas('domains', function (Builder $query) use ($research) {
            $query->whereIn('domain_id', $research->domains->pluck('id')->toArray());
        })->where('id', '!=', $research->id)
            ->orderBy('updated_at', 'asc')->take(4)->get();
        return view('web.researches.detail', compact('research', 'related_researches'));
    }

    public function domain(Domain $domain)
    {
        $domains = Domain::all();
        return view('web.researches.domain', compact('domain', 'domains'));
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
