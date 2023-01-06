<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    //
    public function setLang($locale){
        if($locale=='fr'||$locale=='en'){
            
            App::setLocale('locale');
            session()->put('locale', $locale);
            return redirect()->back();
        }
    }
}
