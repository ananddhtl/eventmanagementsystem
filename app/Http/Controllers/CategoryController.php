<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $category = Category::all();
            return view('admindashboard.allcategory', compact('category'));
        }
    }


    public function addcategory()
    {
        return view('admindashboard.addcategory');
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
            $category = Category::create([
                'title' => $request->title,
                
            ]);
            $category->save();
           

            DB::commit();
            return redirect()->route('category')->with('message','Your data has been saved');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return $this->sendError("Server Error. Please try again later.");
        }
    
}
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
