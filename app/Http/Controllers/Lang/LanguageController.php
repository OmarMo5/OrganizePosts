<?php

namespace App\Http\Controllers\Lang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function switchLanguage($locale)
    {
        if (in_array($locale, ['en', 'fr'])) { // Check if the locale is valid
            App::setLocale($locale);
        } 
        //$locale==='en'? Session::put('locale', 'fr') : Session::put('locale', 'en') ;
        // Redirect back to the previous page or home page
        return redirect()->back();    
    }
}
