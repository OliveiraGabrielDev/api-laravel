<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|min:3',
                'password' => 'required|min:3',
                'email' => 'required',
            ]);

            $user = User::create([
                'name' => $request->name,
                'password' => $request->password,
                'email' => $request->email
            ]);

            return response()->json(['user' => $user, 'message' => 'Usuário criado com sucesso'], 201);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Erro ao criar usuário.', 'errors' => $e->errors()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        try {
            $user = User::where('id', $id)->firstOrFail();
            return response()->json(['user' => $user]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Usuário não encontrado!', 'error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        try {

            $request->validate([
                'name' => 'required|min:3',
                'password' => 'required|min:3',
                'email' => 'required',
            ]);

            $user = User::where('id', $id)->firstOrFail();

            $user->update([
                'name' => $request->name,
                'password' => $request->password,
                'email' => $request->email
            ]);

            return response()->json(['user' => $user, 'message' => 'Usuário criado com sucesso'], 201);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Erro ao criar usuário.', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Usuário não encontrado.', 'error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $user = User::where('id', $id)->firstOrFail();
            $user->delete();

            return response()->json(['message' => 'Usuário deletado com sucesso!.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Usuário não encontrado.', 'error' => $e->getMessage()]);
        }
    }
}
