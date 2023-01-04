<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participate;
// use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events =  Event::all();
        return $events;
    }
    public function show($id)
    {
        $event = Event::find($id);
        return $event;
    }
    public function destroy($id)
    {

        Event::find($id)->delete();
    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->name = $request->name;
        $event->agency_id = $request->agency_id;
        $event->limit = $request->limit;
        $event->date = $request->date;
        $event->location = $request->location;
        $event->status = $request->status;
        $event->save();
    }
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->name = $request->name;
        $event->agency_id = $request->agency_id;
        $event->limit = $request->limit;
        $event->date = $request->date;
        $event->location = $request->location;
        $event->status = $request->status;
        $event->save();
    }
}
