<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request): Response
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return Response(['message' => $validator->errors()], 401);
        }

        if(Auth::attempt($request->all())){
            $user = Auth::user();
            $success = $user->createToken('Token')->plainTextToken;
            return Response(['token' => $success], 200);
        }

        return Response(['message' => 'email or password is incorrect!'], 401);
    }

    public function detail(): Response
    {
        if(Auth::check()){
            $user = Auth::user();
            return Response(['data' => $user], 200);
        }

        return Response(['data' => 'Unauthorized'], 401);
    }

    public function logout(): Response
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();
        return Response(['data' => 'User logout successfully'], 200);
    }
}
