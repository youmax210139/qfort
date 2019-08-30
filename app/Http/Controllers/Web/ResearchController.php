<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\Research;

class ResearchController extends Controller
{

    public function index()
    {
        $domains = Domain::all();
        return view('web.researches.index', compact('domains'));
    }


    public function detail(Research $research)
    {
        return view('web.researches.detail');
    }

    public function domain(Domain $domain)
    {
        $domains = Domain::all();
        $researchs = [];
        return view('web.researches.domain', compact('domain', 'researchs', 'domains'));
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
