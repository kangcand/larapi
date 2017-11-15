<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformers\UserTransformer;

class UserController extends Controller
{
    public function user(User $user)
    {
    	$users = $user->all();
    	// return response()->json($users);
    	return fractal()
    			->collection($users)
    			->transformWith(new UserTransformer)
    			->toArray();
    }
}
