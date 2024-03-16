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

        try {
            DB::beginTransaction();
            $validated = $request->validated();

            $user = NormalUsers::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phonenumber' => $validated['phonenumber'],
                'address' => $validated['address'],
                'gender' => $validated['gender'],
                'password' => bcrypt($validated['password']),
            ]);

            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            $token->expires_at = Carbon::now()->addMonths(3);
            $token->save();

            if (!$tokenResult) {
                return $this->sendError("Server Error. Please try again later.");
            }

            $token = [
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString(),
            ];

            DB::commit();

            return $this->sendResponse(['user' => new NormalUsersResource($user), 'token' => $token]);
        } catch (\Exception $e) {

            DB::rollBack();
            return $this->sendError("Server Error. Please try again later.");
        }
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
    public function destroy(NormalUsers $normalUsers)
    {
        //
    }

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

}
