<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function validateLocale(string $locale = null): void
    {
        if ($locale !== null && !in_array($locale, ['en', 'lt'])) {
            abort(403);
        }
        $locale !== null ? App::setLocale($locale) : App::setLocale('en');
    }
}
