<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\PatronModel;
use Illuminate\Http\Request;

//--Ref: https://www.tutsmake.com/laravel-10-rest-api-crud-with-passport-auth-tutorial/

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $data = [
            'username'      => $request->username,
            'userpass'      => $request->userpass
        ];
  
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('Laravel8PassportAuth')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'username'      => 'required|min:4',
            'userpass'      => 'required|min:6',
            'email'         => 'required|email',
        ]);

        $user = PatronModel::create([
            'username'      => $request->name,
            'userpass'      => bcrypt($request->userpass)
            'role'          => 'Client',
            'email'         => $request->email,
            'status'        => 'active',
        ]);

        $token = $user->createToken('MHzPassportAuth')->accessToken;
  
        return response()->json(['token' => $token], 200);
    }

    public function userInfo() 
    {
        $user = auth()->user();
        return response()->json(['user' => $user], 200);
    }

}
