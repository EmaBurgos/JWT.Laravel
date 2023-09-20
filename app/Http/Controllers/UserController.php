<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $response = Http::withoutVerifying()->get('https://jsonplaceholder.typicode.com/users');
    if ($response->ok()) {
        return $response->json();
    } else {
        return response()->json(['error' => 'No se pudo obtener la lista de usuarios'], 500);
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'admin' => 'boolean',
        ];
        
        $messages = [
            'boolean' => 'Error al editar usuario, campos inválidos para el campo "admin".',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        
        $user->emailPay = $request->input('emailPay');
        $user->admin = $request->input('admin');
        $user->save();

        return response()->json(['message' => 'Usuario Editado']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
          if ($user) {
        $user->delete(); 
        return response()->json(['message' => 'Usuario eliminado']);
    } else {
        return response()->json(['error' => 'Usuario no encontrado'], 404);
    }

    }
}
