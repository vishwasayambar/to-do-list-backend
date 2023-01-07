<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthCntroller extends Controller
{
    public function register(Request $request){
        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'used_for' => $request->input('used_for'),
            'password' => Hash::make($request->input('password'))
        ]);

        return response([
            'message' => 'Register Successfully!',
            'user' => $user
        ], Response::HTTP_CREATED);
    }

    public function updateProfile(Request $request){
        $user = User::find($request->id);
        $user->update($request->all());
        return response([
           'message' => 'Update User Successfully!',
           'user' => Auth::user(),
            ], Response::HTTP_OK);

    }

    public function login(Request $request){
        if(!Auth::attempt($request->only('email','password'))){
            return response([
                'message' => 'Invalid Credentials! Please try again'
            ], Response::HTTP_UNAUTHORIZED);
           }
        $user = Auth::user();
//        return $user; // this will return UserData object
        $token = $user->createToken('token')->plainTextToken;
              return response()->json(['token' => $token]); //this will  return token to response


//        $cookie = Cookie('jwt' , $token, 60*24); // cookie remain For 1 day
//        return response([
//            'message' => 'successfully login!',
//            $cookie
//        ],Response::HTTP_OK)->withCookie($cookie);

    }
    public function user(){
        return Auth::user();
    }
}
