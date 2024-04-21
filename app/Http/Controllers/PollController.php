<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poll = Poll::all();
        return view('admindashboard.poll.list', compact('poll'));
    }

    public function addpoll()
    {
       
        return view('admindashboard.poll.add');
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
        dd($request->all());
        try {
            DB::beginTransaction();

           
            $request->validate([
                'question' => 'required',
                'answers.*' => 'required', 
            ]);

           
            $poll = Poll::create([
                'question' => $request->question,
            ]);

           
            foreach ($request->answers as $answer) {
                $poll->answers()->create([
                    'answer' => $answer,
                ]);
            }

            DB::commit();
            return redirect()->route('poll.index')->with('message', 'Poll created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            // Handle any exceptions
            return redirect()->back()->with('error', 'Failed to create poll. Please try again later.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Poll $poll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poll $poll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poll $poll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poll $poll)
    {
        //
    }
}
