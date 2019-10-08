<?php

namespace App\Http\Controllers\Web;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $validator = Validator::make($request->all(), [
            'subscription_email' => 'required|email|unique:subscriptions,email',
            'subscription_name' => 'required',
            'subscription_job' => 'required',
            'subscription_organization' => 'required',
            'subscription_area' => 'required',
            'other_area' => 'required_if:subscription_area,other',
            'subscription_country' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 403);
        }
        Subscription::create([
            'email' => $request->subscription_email,
            'jobTitle' => $request->subscription_job,
            'organizationName' => $request->subscription_organization,
            'area' => $request->subscription_area == 'other' ?
            $request->other_area : $request->subscription_area,
            'name' => $request->subscription_name,
            'country' => $request->subscription_country,
        ]);
        return response()->json(
            ['responseText' => ['message' => 'subscribtion success!']]
        );
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
