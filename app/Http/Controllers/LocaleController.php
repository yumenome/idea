<?php

namespace App\Http\Controllers;

use App\Models\Lang;
use App\Models\Locale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function index($lang){

        App::setLocale($lang);
        session()->put('locale', $lang);

        return redirect()->route('dashboard');
    }
}
