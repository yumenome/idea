<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        // app()->setLocale(session()->get('locale'));
        return view('admin.mainboard');
    }
}
