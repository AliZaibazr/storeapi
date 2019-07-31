<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    public function register (Request $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        if($user->save())
        {
            return response()->json($user);
        }
        return response()->json('error user not registered');
    }

    public function login(Request $request)
    {
        $credentials = [ 'email'=>$request->get('email'),
    'password'=>$request->get('password')
    ];
   if(Auth::attempt($credentials))
   {
       return response()->json('Success, You Are logged in',200);
   } 
   return response()->json('failed you are not registered');
    }
}
