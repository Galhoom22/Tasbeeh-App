<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function switchTheme($theme)
    {
        session()->put('theme', $theme);
        return redirect()->back();
    }
}
