<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\EventType;
use App\Http\Controllers\Controller;


class EventTypeController extends Controller{

    public function index(){
        return EventType::all();
    }

    public function store(Request $request){
        $event_type = new EventType;
        $event_type->name = $request->name;
        $event_type->save();

        return $event_type;
    }

    public function show($id){
        return EventType::findOrFail($id);
    }

    public function update(Request $request, $id){
        $event_type = EventType::findOrFail($id);
        $event_type->update($request->all());

        return $event_type;
    }

    public function destroy($id){
        $event_type = EventType::findOrFail($id);
        $event_type->delete();
    }
}
