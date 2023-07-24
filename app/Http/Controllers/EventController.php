<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\EventFormRequest;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date_time', 'desc')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(EventFormRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['image'] = $request->file('image')->store('eventImage');
        Event::create($validatedData);
        return redirect()->route('events.index')->with('success', 'Event added successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(EventFormRequest $request, Event $event)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            Storage::delete($event->image);
            $validatedData['image'] = $request->file('image')->store('eventImage');
        }
        $event->update($validatedData);
        return redirect()->route('events.index')->with('info', 'Details updated successfully.');
    }

    public function destroy(Event $event)
    {
        Storage::delete($event->image);
        $event->delete();
        return redirect()->route('events.index')->with('danger', 'Event removed successfully.');
    }
}
