<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'password' => 'required|min:3',
            'email' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email
        ]);

        return response()->json($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->update([
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email
        ]);

        return response()->json($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->delete();
    }
}
