<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformers\UserTransformer;

class AuthController extends Controller
{
    public function register(Request $request, User $user)
    {
    	$this->validate($request,[
    		'name' => 'required',
    		'email' => 'required|unique:users|email',
    		'password' =>'required|min:6'
    	]);

    	$user = $user->create([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => bcrypt($request->password),
    		'api_token' => bcrypt($request->email),
    	]);

    	$response = fractal()
    			->item($user)
    			->transformWith(new UserTransformer)
    			->toArray();
    	return response()->json($response, 201);
    }

    public function login($value='')
    {
    	# code...
    }
}
