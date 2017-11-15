<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformers\UserTransformer;
use Auth;
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
    			->addmeta(['token'=>$user->api_token])
    			->toArray();
    	return response()->json($response, 201);
    }

    public function login(Request $request, User $user)
    {
    	if (!Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
    		return response()->json(['error'=>'Your Credential is wrong'],401);
    	}
    	$user = $user->find(Auth::user()->id);
    	$response = fractal()
    			->item($user)
    			->transformWith(new UserTransformer)
    			->addmeta(['token'=>$user->api_token])
    			->toArray();
    	return response()->json($response, 201);
    }
}
