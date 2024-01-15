<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        app()->setLocale(session()->get('locale'));

        $user = auth()->user();

        $followingIDs = $user->followings()->pluck('user_id');

                    //give ideea with followingIds
        $ideas = Idea::whereIn('user_id', $followingIDs)->latest();

        if(request()->has('search')){
            $search = $ideas->where('content', 'like', '%'. request()->get('search'). '%');
        }

        return view('components.feed',[
            'ideas' => $ideas->paginate(7),
        ]);
    }
}
