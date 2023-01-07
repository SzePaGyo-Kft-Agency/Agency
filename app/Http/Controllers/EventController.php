<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participate;
use Carbon\Carbon;
// use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function inviteNew($userId, $eventId){
        $db = DB::connection();
        $event = $db->select("SELECT COUNT(*) as attendees, capacity FROM events WHERE event_id = :event_id", ["event_id" => $eventId])[0];
        if ($event->attendees >= $event->limit) {
            
            return "Sorry, the event is fully booked.";
        }
        

    }

    public function delay($eventId){
        /*
        $event = EventController::show($eventId);
        $date = Carbon::createFromFormat('Y.m.d', $event->date);
        DB::table('events')
        ->where('events.event_id','=',$eventId)
        ->update(['events.date' => $date->addDays(7)]);
        */
        
        $delay = DB::table('events')
    ->where('events.event_id', $eventId)
    ->update([
        'events.date' => DB::raw('events.date + INTERVAL 7 DAY')
    ]);
    }
}
