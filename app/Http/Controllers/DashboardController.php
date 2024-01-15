<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    function index(){
        app()->setLocale(session()->get('locale'));

        $ideas = Idea::orderBy('created_at', 'desc');

        if(request()->has('search')){
            $search = $ideas->where('content', 'like', '%'. request()->get('search'). '%');
        }

        return view('dashboard',[
            'ideas' => $ideas->paginate(7),
        ]);
    }
}
