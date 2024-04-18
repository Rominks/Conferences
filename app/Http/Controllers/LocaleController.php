<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class LocaleController extends Controller
{
    public function changeLocale(Request $request): JsonResponse
    {
        $locale = $request->input('locale');
        if (!in_array($locale, ['en', 'lt'])) {
            abort(403);
        }
        App::setLocale($locale);
        Lang::setLocale($locale);
        session(['locale' => $locale]);
        return response()->json(['success' => true, 'locale' => App::getLocale()]);
    }
}
