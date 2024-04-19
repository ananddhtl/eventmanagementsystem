<?php

namespace App\Http\Controllers;

use App\Models\FavouriteEvent;
use App\Models\NormalUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavouriteEventController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
             
             $user = NormalUsers::findOrFail(auth('api')->user()->id);
     
            
             $existingFavorite = FavouriteEvent::where('user_id', $user->id)
                                               ->where('event_id', $request->event_id)
                                               ->first();
     
             if ($existingFavorite) {
                
                 DB::rollBack();
                 return $this->sendError("Event already added to favorites.");
             }
     
           
             $favouriteEvent = FavouriteEvent::create([
                 'event_id' => $request->event_id,
                 'user_id' => $user->id,
             ]);
     
             DB::commit();
     
             return $this->sendResponse([], "Successfully added to favorites");
         } catch (\Exception $e) {
             
             DB::rollBack();
             return $this->sendError("Server Error. Please try again later.");
         }
     }
     
    
    public function show(FavouriteEvent $favouriteEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FavouriteEvent $favouriteEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FavouriteEvent $favouriteEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $user = NormalUsers::findOrFail(auth('api')->user()->id);
    
            $request->validate([
                'event_id' => 'required|exists:favourite_events,event_id,user_id,'.$user->id,
            ]);
    
          
            $favoriteEvent = FavouriteEvent::where('user_id', $user->id)
                                           ->where('event_id', $request->event_id)
                                           ->first();
    
            if (!$favoriteEvent) {
                return $this->sendError('Favorite event not found.');
            }
    
          
            $favoriteEvent->delete();
    
            return $this->sendResponse([], 'Favorite event deleted successfully.');
        } catch (Exception $e) {
            return $this->sendError('Something went wrong!');
        }
    }
    
}
