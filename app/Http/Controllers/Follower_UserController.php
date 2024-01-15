<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Follower_UserController extends Controller
{
    public function follow(User $user)
    {
        // current user's gonna be a follower
        $follower = auth()->user();
        //attach with the clicked user to follow
        $follower->followings()->attach($user);

        return redirect()
            ->route('users.show', $user->id)
            ->with('success', 'followed!');
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();

        $follower->followings()->detach($user);

        return redirect()
            ->route('users.show', $user->id)
            ->with('success', 'unfollowed!');
    }
}
