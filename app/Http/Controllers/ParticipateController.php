<?php

namespace App\Http\Controllers;

use App\Models\Participate;
use Illuminate\Http\Request;

class ParticipateController extends Controller
{
    public function index()
    {
        $participates =  Participate::all();
        return $participates;
    }
    // public function show($id)
    // {
    //     $participate = Participate::find($id);
    //     return $participate;
    // }
    public function show($user_id, $event_id)
    {

        $participation = Participate::where('user_id', $user_id)->where('event_id', $event_id)->get()->first();
        return $participation;
    }
    public function destroy($user_id, $event_id)
    {
        $participation = Participate::where('user_id', $user_id)->where('event_id', $event_id)->get()->first();
        $participation->delete();
    }

    public function store(Request $request)
    {
        $participate = new Participate();
        $participate->user_id = $request->user_id;
        $participate->event_id = $request->event_id;
        $participate->present = $request->present;
        $participate->save();
    }
    public function update(Request $request, $id)
    {
        $participate = Participate::find($id);
        $participate->user_id = $request->user_id;
        $participate->event_id = $request->event_id;
        $participate->present = $request->present;
        $participate->save();
    }
}
