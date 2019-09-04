<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{

    public function index(Request $request)
    {
        $peoples = People::ofCategory($request->c)->get();
        $categories = Category::where('type', 'people')->get();
        return view('web.peoples.index', compact('peoples', 'categories'));
    }

    public function detail(People $people)
    {
        return view('web.peoples.detail', compact('people'));
    }

    public function video(People $people)
    {
        return view('web.peoples.video', compact('people'));
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
