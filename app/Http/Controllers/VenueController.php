<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venue = Venue::all();
        return view('admindashboard.allvenue', compact('venue'));
    }

    public function addvenue()
    {
        return view('admindashboard.addvenue');
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
                'title' => 'required',

            ]);
            $venue = Venue::create([
                'title' => $request->title,

            ]);
            $venue->save();

            DB::commit();
            return redirect()->route('venue')->with('success', 'Your data has been saved');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return $this->sendError("Server Error. Please try again later.");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venue $venue, $id)
    {
        $editvenue = Venue::find($id);
        return view('admindashboard.editvenue', compact('editvenue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $request->validate([
                'title' => 'required',
            ]);

            $venue = Venue::findOrFail($id);

            $venue->title = $request->title;

            $venue->save();

            DB::commit();

            return redirect()->route('venue')->with('success', 'Your data has been updated');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return $this->sendError("Server Error. Please try again later.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue, $id)
    {

        $venue = Venue::find($id);
        if (!$venue) {
            return response()->json(['error' => 'Category  not found'], 404);
        }
        $venue->delete();
        return redirect()->route('venue')->with('success', 'Your data has been deleted successfully');
    }

    

    
}
