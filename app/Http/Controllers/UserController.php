<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transformers\UserTransformer;
use Auth;
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

    public function profil(User $user)
    {
    	$users = $user->find(Auth::user()->id);
    	// return response()->json($users);
    	return fractal()
    			->item($users)
    			->transformWith(new UserTransformer)
                ->includePosts()
    			->toArray();
    }

    public function profilById(User $user, $id)
    {
        $users = $user->find($id);
        // return response()->json($users);
        return fractal()
                ->item($users)
                ->transformWith(new UserTransformer)
                ->includePosts()
                ->toArray();
    }
}
