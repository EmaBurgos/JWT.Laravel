<?php

namespace App\Http\Controllers;

use App\Mail\EmailSend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function store($destinario)
    {

        $user = User::where('email', $destinario)->first();

        if (!$user) {
            // Maneja el caso en el que no se encuentra el usuario
            return 'Usuario no encontrado';
        }

        // Luego, pasa el usuario como argumento al crear la instancia de EmailSend
        Mail::to($destinario)->send(new EmailSend($user));

        return 'Correo Enviado con exito';
    }


}
