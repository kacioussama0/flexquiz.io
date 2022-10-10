<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguagesController extends Controller
{
    public function english() {
        app()->setLocale('en');
        return redirect()->back();
    }
    public function arabic() {
        app()->setLocale('ar');
        return redirect()->back();
    }
}
