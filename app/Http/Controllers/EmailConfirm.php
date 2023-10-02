<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmailConfirm extends Controller
{
    public function update($token)
    {
        $user = User::where('token',$token)->first();

        if(!$user) {
            return 'Token invalido';
        }

        $user->update(['verified'=>true]);

        return 'Confirmado con exito';
    }
}
