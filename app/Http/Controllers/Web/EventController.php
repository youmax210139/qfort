<?php

namespace App\Http\Controllers\Web;

use App\Models\Carousel;
use App\Mail\RegisterEvent;
use App\Models\Category;
use App\Models\Event;
use App\Models\Guest;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{

    public function index(Request $request)
    {
        $events = Event::getPinTop(Event::ofCategory($request->c), null);
        $categories = Category::where('type', 'event')->get();
        $carousel = Carousel::where([
            ['type', '=', 'event'],
            ['status', '=', 'A']
        ])->ordered()->first();
        return view('web.events.index', compact('events', 'categories', 'carousel'));
    }

    public function detail(Event $event)
    {
        return view('web.events.detail', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRegistration(Event $event)
    {
        return view('web.events.register', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRegistration(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
            'job' => 'required',
            'organization' => 'required',
            'area' => 'required',
            'other_area' => 'required_if:area,other',
            'country' => 'required',
            'subscription' => 'nullable',
        ]);

        $password = str_random(12);
        $guest = Guest::firstOrCreate([
            'email' => $request->email,
        ], [
            'email' => $request->email,
            'name' => $request->name,
            'telephone' => $request->telephone,
            'jobTitle' => $request->job,
            'organization' => $request->organization,
            'area' => $request->area == 'other' ? $request->other_area : $request->area,
            'country' => $request->country,
        ]);
        // if ($guest->wasRecentlyCreated) {

        // }
        if ($request->subscription == true) {
            Subscription::firstOrCreate([
                'email' => $request->email,
            ], [
                'email' => $request->email,
                'jobTitle' => $request->job,
                'organization' => $request->organization,
                'area' => $request->area == 'other' ?
                $request->other_area : $request->area,
                'name' => $request->name,
                'country' => $request->country,
            ]);
        }

        $hasEvent = $guest->events()->find($event->id);
        if ($hasEvent) {
            return back()->withInput()->with('event-registration-success', 'You have enrolled alreay.');
        }
        $guest->events()->attach($event);
        $to = [
            [
                'email' => $request->email,
                'name' => $request->name,
            ],
        ];
        try{
            Mail::to($to)->send(new RegisterEvent($guest, $event));
        }
        catch(\Exception $e){
        }

        return back()->withInput()
            ->with('event-registration-success', 'Your guest has been created, please check your email for detail.');
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
