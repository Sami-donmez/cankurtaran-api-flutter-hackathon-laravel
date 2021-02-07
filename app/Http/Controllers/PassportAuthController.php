<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PassportAuthController extends Controller
{

    //TODO: TOKEN ADI LaravelAuthApp
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            $user=[
                'id'=>auth()->user()->id,
                'name'=>auth()->user()->name,
                'email'=>auth()->user()->email,
                'profile_picture'=>url('public/images/'.auth()->user()->profile_picture),
                'address'=>auth()->user()->address,
                'blood'=>auth()->user()->blood,
                'token'=>$token
            ];
            return response()->json($user, 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
}
