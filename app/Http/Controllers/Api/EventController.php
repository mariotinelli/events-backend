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
        $img = $validated['img'];
        $filenameWithExt = $img->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $img->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $img->storeAs('public/img', $fileNameToStore);
        $validated['img'] = $fileNameToStore;

        return Event::create($validated);
    }

    public function show(Event $event){
        return Event::findOrFail($event->id);
    }

    public function updateEvent(UpdateRequest $request, Event $event){
        $validated = $request->validated();

        if ($request->hasFile('img')) {
            $img = $validated['img'];
            $filenameWithExt = $img->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $img->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $img->storeAs('public/img', $fileNameToStore);
            $request->img = $fileNameToStore;     
            $validated['img'] = $fileNameToStore;            
        }

        $event->update($validated);
        $event->refresh();
        return $event;
    }

    public function update(UpdateRequest $request, Event $event){
        return $request->all();
        /*$validated = $request->validated();
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $filenameWithExt = $img->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $img->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $img->storeAs('public/img', $fileNameToStore);
            $request->img = $fileNameToStore;     
            //$validated['img'] = $fileNameToStore;            
        } else {
            return $validated;
        }
        $event->update($request->all());
        $event->refresh();
        return $event;*/
    }

    public function destroy(Event $event){
        return $event->delete();
    }
}
