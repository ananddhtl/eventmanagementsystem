<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\NormalUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\FavouriteEvent;

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

    public function getorganizerevent()
    {
        try {
            $userid = auth('api')->user()->id; 
    
            $events = Event::where('organizer_id', $userid)->where('status',1)->get();
    
           
            if ($events->isEmpty()) {
                return $this->sendError('Events not found for this organizer!');
            }
    
           
            return $this->sendResponse(EventResource::collection($events), 'Events fetched successfully!');
        } catch (Exception $e) {
            return $this->sendError('Something went wrong!');
        }
    }
    
    public function forhomepageapi()
    {
        try {
            $events = Event::all()->shuffle();

            
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

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/event/', $img_name);
            $save_url = '/uploads/event/' . $img_name;
            $thumbnail = $save_url; 
        } else {
            $thumbnail = null; 
        }

        $event = Event::create([
            'event_title' => $validated['event_title'],
            'description' => $validated['description'],
            'event_date' => $validated['event_date'],
            'event_time' => $validated['event_time'],
            'location' => $validated['location'],
            'category' => $validated['category'],
            'thumbnail' => $thumbnail, 
            'total_seats' => $validated['total_seats'],
            'total_vip_seats' => $validated['total_vip_seats'],
            'total_public_seats' => $validated['total_public_seats'],
            'vip_seats_price' => $validated['vip_seats_price'],
            'public_seats_price' => $validated['public_seats_price'],
            'organizer_id' => $user->id,
        ]);

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
        
       
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/event/', $img_name);
            $save_url = '/uploads/event/' . $img_name;
            $event->thumbnail = $save_url;
        }
        
       
        $event->event_title = $validated['event_title'];
        $event->description = $validated['description'];
        $event->event_date = $validated['event_date'];
        $event->event_time = $validated['event_time'];
        $event->location = $validated['location'];
        $event->total_seats = $validated['total_seats'];
        $event->total_vip_seats = $validated['total_vip_seats'];
        $event->total_public_seats = $validated['total_public_seats'];
        $event->vip_seats_price = $validated['vip_seats_price'];
        $event->public_seats_price = $validated['public_seats_price'];
       
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

            $event = Event::where('status',0)->get();

            return view('admindashboard.eventdetails', compact('event'));

        } catch (Exception $e) {
            return $this->sendError('Something went wrong!');
        }
    }

    public function allacceptedevents()
    {
        try {

            $event = Event::where('status',1)->get();

            return view('admindashboard.acceptedeventdetails', compact('event'));

        } catch (Exception $e) {
            return $this->sendError('Something went wrong!');
        }
    }

    public function acceptevent(Event $event, $id)
    {

        $event = Event::find($id);
        if (!$event) {
            return response()->json(['error' => 'Event  not found'], 404);
        }

        $organizeremail = NormalUsers::join('events', 'normal_users.id', '=', 'events.organizer_id')
                            ->where('events.id', $id)
                            ->value('normal_users.email');

        $data = [
            'email' => $organizeremail, 
            'message' => "This is the text message"
        ];
    
        Mail::send('email-template.approvaltemplate', $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject('Your Vehicle has been approved');
            $message->from('baralsantos10@gmail.com');
        });
        $event->status = 1;
        $event->save();
        return redirect()->route('getallevents')->with('message', 'Your venue has been approved successfully');
    }

    public function searchevent(Request $request)
{
    $validator = Validator::make($request->all(), [
        'title' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()->first()], 400);
    }

    try {
        $title = $request->input('title');
        $events = Event::where('event_title', 'like', "%$title%")->get();
        
        if ($events->isEmpty()) {
            return response()->json(['error' => 'Event not found'], 404);
        }

        return $this->sendResponse(EventResource::collection($events), 'Events fetched successfully!');
    } catch (Exception $e) {
        return $this->sendError('Something went wrong!');
    }
}

public function categorywiseevent(Request $request, $id)
{
   
    try {
      
        $events = Event::where('category', $id)->get();
        
        if ($events->isEmpty()) {
            return response()->json(['error' => 'Event not found'], 404);
        }

        return $this->sendResponse(EventResource::collection($events), 'Events fetched successfully!');
    } catch (Exception $e) {
        return $this->sendError('Something went wrong!');
    }
}
public function getorganizerfavouriteevent()
{
    try {
        $user = NormalUsers::findOrFail(auth('api')->user()->id);

       
        $favouriteEvents = FavouriteEvent::where('user_id', $user->id)->pluck('event_id');

      
        $events = Event::whereIn('id', $favouriteEvents)
                       ->where('status', 1)
                       ->get();

        if ($events->isEmpty()) {
            return $this->sendError('Favorite Events not found for this organizer!');
        }

        return $this->sendResponse(EventResource::collection($events), 'Events fetched successfully!');
    } catch (Exception $e) {
        return $this->sendError('Something went wrong!');
    }
}

}
