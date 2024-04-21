<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseApiController;
use App\Models\NormalUsers;
use Illuminate\Http\Request;

class NormalUsersController extends BaseApiController
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

    }

    /**
     * Display the specified resource.
     */
    public function show(NormalUsers $normalUsers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NormalUsers $normalUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NormalUsers $normalUsers)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
   

    public function becomeorganizer(Request $request, NormalUsers $normalUsers)
    {
        {
            try {
                $user = NormalUsers::findOrfail(auth('api')->user()->id);
                $user->status = 1;
                $user->save();
                return $this->sendResponse([
                ], "Sucessfully updated the user into organizer");
            } catch (\Exception $e) {
                dd($e->getMessage());
                return $this->sendError("Server Error. Please try again later.");
            }
        }
    }
    public function allorganizers(Request $request, NormalUsers $normalUsers)
    {
        {
            try {
                $user = NormalUsers::where('status', 1)->get();
                return view('admindashboard.allorganizers', compact('user'));
            } catch (\Exception $e) {
                dd($e->getMessage());
                return $this->sendError("Server Error. Please try again later.");
            }
        }
    }
    public function allNormalUser(Request $request)
{
    try {
        $usersQuery = NormalUsers::query();

       
        if ($request->has('user_name')) {
            $userName = $request->input('user_name');
            $usersQuery->where('name', 'like', "%$userName%");
        }

       
        $usersQuery->where('status', 0);

    
        $user = $usersQuery->get();

      
        return view('admindashboard.allusers', compact('user'));
    } catch (\Exception $e) {
       
        dd($e->getMessage()); 
        return $this->sendError("Server Error. Please try again later."); 
    }
}
    public function destroy($id)
    {
        try {
          
            $normalUsers = NormalUsers::findOrFail($id);
            
          
            $normalUsers->delete();
            
          
            return redirect()->back()->with('success', 'Data deleted successfully.');
        } catch (\Exception $e) {
           
            return redirect()->back()->with('error', 'Failed to delete category.');
        }
    }

    public function demoteorganizer($id)
    {
        try {
          
            $user = NormalUsers::findOrFail($id);
            
            $user->status = 0;
            $user->save();
          
            return redirect()->back()->with('success', 'Organizer updated successfully.');
        } catch (\Exception $e) {
           
            return redirect()->back()->with('error', 'Failed to delete category.');
        }
    }

}
