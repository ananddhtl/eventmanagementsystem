<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list =  FAQ::get();
        return view('admindashboard.faq.list',compact('list'));
    }
    

    public function addfaq()
    {
        return view('admindashboard.faq.add');
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
       
        $faq = new FAQ();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        
        return redirect()->route('faq.index')->with('success', 'FAQ created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(FAQ $fAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FAQ $fAQ, $id)
    {
        $editfaq =  FAQ::find($id);
        return view('admindashboard.faq.edit',compact('editfaq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FAQ $fAQ, $id)
    {
      
        $faq =  FAQ::findOrFail($id);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FAQ $fAQ, $id)
    {
        $faq =  FAQ::findOrFail($id);
        if (!$faq) {
            return response()->json(['error' => 'FAQ  not found'], 404);
        }
        $faq->delete();
        return redirect()->back()->with('success', 'Your data has been deleted successfully');
    }
}
