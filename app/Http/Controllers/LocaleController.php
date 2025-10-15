<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function switchLanguage($locale, Request $request)
    {
        session()->put('user_locale', $locale);
        return redirect()->back();
    }
}
