<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\Event\StoreRequest;
use App\Http\Requests\Event\UpdateRequest;
use App\Models\Event;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index(){
        return Event::all();
    }

    public function store(StoreRequest $request){
        $validated = $request->validated();
        return Event::create($validated);
    }

    public function show(Event $event){
        return Event::findOrFail($event->id);
    }


    public function update(UpdateRequest $request, Event $event){
        $validated = $request->validated();
        $event->update($validated);
        $event->refresh();
        return $event;
    }

    public function destroy(Event $event){
        return $event->delete();
    }
}
