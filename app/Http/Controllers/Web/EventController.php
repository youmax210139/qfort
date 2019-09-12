<?php

namespace App\Http\Controllers\Web;

use App\Mail\RegisterEvent;
use App\Models\Category;
use App\Models\Event;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{

    public function index(Request $request)
    {
        $events = Event::getPinTop(Event::ofCategory($request->c), 6);
        $categories = Category::where('type', 'event')->get();
        return view('web.events.index', compact('events', 'categories'));
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
        ]);

        $password = str_random(12);
        $guest = Guest::firstOrCreate([
            'email' => $request->email,
        ], [
            'email' => $request->email,
            'name' => $request->name,
            'telephone' => $request->telephone,
            'password' => $password,
        ]);
        if ($guest->wasRecentlyCreated) {
            $guest->events()->attach($event);
            $to = [
                [
                    'email' => $request->email, 
                    'name' => $request->name,
                ]
            ];
            Mail::to($to)->send(new RegisterEvent($guest, $password));
            return back()->withInput()
            ->with('event-registration-success', 'Your guest has been created, please check your email for detail.');
        }
        return back()->withInput()
            ->with('event-registration-success', 'You have enrolled alreay.');
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
