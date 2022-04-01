<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index(){
        return Event::all();
    }

    public function store(Request $request){
        $event = new Event;
        $event->title = $request->title;
        $event->locality = $request->locality;
        $event->img = $request->img;
        $event->participants = $request->participants;
        $event->description = $request->description;
        //$event->date = $request->date;
        $event->save();

        return $event;
    }

    public function show($id){
        return Event::findOrFail($id);
    }


    public function update(Request $request, $id){
        $event = Event::findOrFail($id);
        $event->update($request->all());

        return $event;
    }

    public function destroy($id){
        $event = Event::findOrFail($id);
        $event->delete();
    }
}
