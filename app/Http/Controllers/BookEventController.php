<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookEventResource;
use App\Models\BookEvent;
use App\Models\Event;
use App\Models\NormalUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookEventController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        try {
            $user = NormalUsers::findOrFail(auth('api')->user()->id);

            $bookEvents = BookEvent::where('user_id', $user->id)->get();

            if ($bookEvents->isEmpty()) {
                return $this->sendError('Events not found!', 404);
            }

            return $this->sendResponse(BookEventResource::collection($bookEvents), 'Events fetched successfully!');
        } catch (ModelNotFoundException $e) {
            return $this->sendError('User not found!', 404);
        } catch (Exception $e) {
            return $this->sendError('Something went wrong!', 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            DB::beginTransaction();
            $request->validate([
                'event_id' => 'required',
                'qty' => 'required',
                'refrence_id' => 'required',
                'ticket_type' => 'required',
            ]);
            $user = NormalUsers::findOrFail(auth('api')->user()->id);

            $event = Event::where('id', $request->event_id)->first();

            if (!$event) {
                return $this->sendError('Event not found!');
            }
            $bookEvent = BookEvent::create([
                'transaction_code' => $request->refrence_id,
                'user_id' => $user->id,
                'event_id' => $request->event_id,
                'qty' => $request->qty,
                'ticket_type' => $request->ticket_type,
                'total_price' => $request->total_price,
            ]);
            if ($request->ticket_type === 'vip') {
                $event->total_available_vip_seats += $request->qty;
            } else {
                $event->total_available_public_seats += $request->qty;
            }
            $bookEvent->save();
            $event->save();

            DB::commit();

            return $this->sendResponse([], "Successfully Stored");
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->sendError("Server Error. Please try again later.");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BookEvent $bookEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookEvent $bookEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookEvent $bookEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookEvent $bookEvent)
    {
        //
    }

}
