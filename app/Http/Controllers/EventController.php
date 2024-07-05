<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'url' => 'required',
            'max' => 'required|integer',
            'min' => 'required|integer',
        ]);

        $event = new Event;
        $event->name = $request->name;
        $event->date = $request->date;
        $event->url = $request->url;
        $event->max = $request->max;
        $event->min = $request->min;
        $event->save();

        if ($event) {
            $data = [
                'message' => 'Event created successfully',
                'event' => $event
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to created event'], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {

        if ($event) {
            $data = [
                'message' => 'Event details',
                'event' => $event
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error'], 500);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'url' => 'required',
            'max' => 'required|integer',
            'min' => 'required|integer',
        ]);

        $event->name = $request->name;
        $event->date = $request->date;
        $event->url = $request->url;
        $event->max = $request->max;
        $event->min = $request->min;
        $event->save();
        if ($event) {
            $data = [
                'message' => 'Event updated successfully',
                'event' => $event
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to updated event'], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        if ($event) {
            $data = [
                'message' => 'Event deleted successfully',
                'event' => $event
            ];
            return response()->json($data);
        }


        return response()->json(['message' => 'Error to deleted event'], 500);
    }
}
