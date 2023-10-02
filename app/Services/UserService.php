<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class UserService
{
    public function getUsers()
    {
        $response = Http::withoutVerifying()->get('https://jsonplaceholder.typicode.com/users');

        if($response->ok()){
            return $response->json();
        } else {
            return [];
        }
    }

    public function getUsersByCompany($companyName) 
    {
        $response = Http::withoutVerifying()->get('https://jsonplaceholder.typicode.com/users');
        
        if ($response->ok()) {
            $users = $response->json();
            
            $filteredUsers = array_filter($users, function ($user) use ($companyName) {
                return $user['company']['name'] === $companyName;
            });
            
            return $filteredUsers;
        } else {
            return [];
        }

    }
}