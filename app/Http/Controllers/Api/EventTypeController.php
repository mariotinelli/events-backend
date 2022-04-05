<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\EventType;
use App\Http\Controllers\Controller;

use App\Http\Requests\EventType\StoreRequest;
use App\Http\Requests\EventType\UpdateRequest;


class EventTypeController extends Controller{

    public function index(){
        return EventType::all();
    }

    public function store(StoreRequest $request){
        $validated = $request->validated();
        return EventType::create($validated);
    }

    public function show(EventType $eventType){
        return EventType::findOrFail($eventType->id);
    }

    public function update(UpdateRequest $request, EventType $eventType){
        $validated = $request->validated();
        $eventType->update($validated);
        $eventType->refresh();

        return $eventType;
    }

    public function destroy(EventType $eventType){
        $eventType->delete();
    }
}
