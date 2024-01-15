<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class Idea_LikeController extends Controller
{
    public function like(Idea $idea){

        $liker = auth()->user();

        /** @var \App\Models\User $user */
        $liker->likeRS()->attach($idea);

        return redirect()->route('dashboard');

    }

    public function unlike(Idea $idea){

        $liker = auth()->user();

/** @var \App\Models\User $user */
        $liker->likeRS()->detach($idea);

        return redirect()->route('dashboard');

    }
}
