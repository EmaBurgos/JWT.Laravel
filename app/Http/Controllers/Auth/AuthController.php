<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ]);

        $token = JWTAuth::fromUser($user);
        $user->update(['token'=>$token]);

        app(EmailController::class)->store($user->email);

        return response()->json([
            'message' => 'Usuario registrado con éxito',
            'user' => $user,
        ], 200);
    }
    public function login(LoginRequest $request)
    {
        $credencials = $request->only('email','password');
        try {
            if(!$token = JWTAuth::attempt($credencials)) {
                return response()->json([
                    'error'=>'Credenciales invalidas'
                ],400);
            }

            $user = JWTAuth::user();

            if(!$user->verified){
                return response()->json([
                    'error' => 'Usuario no verificado. Por favor, verifica tu correo electrónico o contáctanos.'
                ], 403);
            }
        
        } catch(JWTException $e) {
         return response()->json([
            'error' => 'No se pudo crear el token'
         ], 500);   
        }

        return response()->json(compact('token'));
    }                      
}