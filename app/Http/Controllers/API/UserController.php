<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReservationRessource;
use App\Http\Resources\UserRessource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
//    creation d'un utilisateur
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telephone = $request->telephone;
        $user->password = Hash::make('password');
        if ($user->save()) {
            return new UserRessource($user);
        } else {
            return response([
                'statut' => 0
            ], 404);
        }
    }

//connexion d'un utilisateur
    public function login()
    {
        $isconnect = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        if ($isconnect) {
            $user = User::where('email', request('email'))->first();
            return new UserRessource($user);
        } else {
            return
                response([
                    'statut' => 0
                ], 404);
        }
    }

//recuperation des reservations de user
    public function reservation($id)
    {
        $reservation = User::find($id)->reservation()->get();
        return ReservationRessource::collection($reservation);
    }
}
