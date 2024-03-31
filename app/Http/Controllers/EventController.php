<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\NormalUsers;
use Illuminate\Support\Facades\DB;

class EventController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {

        try {

            $event = Event::findOrFail($id);

            if (!$event) {
                return $this->sendError('Event not found!');
            }

            return $this->sendResponse(new EventResource($event), 'Event fetched successfully!');
        } catch (Exception $e) {
            return $this->sendError('Something went wrong!');
        }
    }
    public function forhomepageapi()
    {
        try {
            $events = Event::all();

            $eventResources = [];
            foreach ($events as $event) {
                $eventResources[] = new EventResource($event);
            }

            return $this->sendResponse($eventResources, 'Events fetched successfully!');
        } catch (Exception $e) {
            return $this->sendError('Something went wrong!');
        }
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $user = NormalUsers::findOrFail(auth('api')->user()->id);
            $event = Event::create([
                'event_title' => $validated['event_title'],
                'description' => $validated['description'],
                'event_date' => $validated['event_date'],
                'event_time' => $validated['event_time'],
                'location' => $validated['location'],
                'thumbnail' => $validated['thumbnail'],
                'total_seats' => $validated['total_seats'],
                'total_vip_seats' => $validated['total_vip_seats'],
                'total_public_seats' => $validated['total_public_seats'],
                'vip_seats_price' => $validated['vip_seats_price'],
                'public_seats_price' => $validated['public_seats_price'],
                'organizer_id' => $user->id,
            ]);

            $event->save();

            DB::commit();

            return $this->sendResponse([], "Successfully Stored");
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return $this->sendError("Server Error. Please try again later.");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $user = NormalUsers::findOrFail(auth('api')->user()->id);
            if (!$user) {
                return $this->sendError('User not found!');
            }
            $event = Event::where('id', $id)
                ->where('organizer_id', $user->id)
                ->firstOrFail();
            if (!$event) {
                return $this->sendError('Event not found!');
            }
            $event->event_title = $validated['event_title'];
            $event->description = $validated['description'];
            $event->event_date = $validated['event_date'];
            $event->event_time = $validated['event_time'];
            $event->location = $validated['location'];
            $event->thumbnail = $validated['thumbnail'];
            $event->total_seats = $validated['total_seats'];
            $event->total_vip_seats = $validated['total_vip_seats'];
            $event->total_public_seats = $validated['total_public_seats'];
            $event->vip_seats_price = $validated['vip_seats_price'];
            $event->public_seats_price = $validated['public_seats_price'];
            $event->organizer_id = $user->id;
            $event->save();

            DB::commit();

            return $this->sendResponse([], "Successfully Updated");
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return $this->sendError("Server Error. Please try again later.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $event = Event::findOrFail($id);
            if (!$event) {
                return $this->sendError('Event not found!');
            }
            $event->delete();
            return $this->sendResponse([], "Successfully Deleted");

        } catch (Exception $e) {
            return $this->sendError('Something went wrong!');
        }
    }

    public function allevents()
    {
        try {

            $event = Event::get();

            return view('admindashboard.eventdetails', compact('event'));

        } catch (Exception $e) {
            return $this->sendError('Something went wrong!');
        }
    }

}
