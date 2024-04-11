<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index($locale = null) {
        if ($locale === null) {
            App::setLocale('en');
        } else {
            if (! in_array($locale, ['en', 'lt', 'de'])) {
                abort(403);
            }

            App::setLocale($locale);
        }

        return view('home.index');
    }
    public function contact() {
        return view('home.contact');
    }
}
