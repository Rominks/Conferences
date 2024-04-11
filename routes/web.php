<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/{locale?}', [HomeController::class, 'index'])->name("home.index");

//Route::get('/', static function () {
//   return redirect('/en');
//});


Route::get('/contact/{locale}', static function ($locale) {
//    if (! in_array($locale, ['en', 'lt', 'de'])) {
//        abort(403);
//    }

    App::setLocale($locale);
    return view('home.contact');
})->name("home.contact");

Route::get('/articles', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/articles/list', function (Request $request) {
//    $input = $request->all();
//    // or
////    $input = request()->all();
//    return view('home.contact');
    dd($request->post());
});


Route::prefix('/lecture')->name('lecture')->group(static function () {
    Route::get('memes/download', static function () {
        return response()->download('img/7e1.png', 'good_meme.png');
    });
    Route::get('responses', static function () {
        $articles = [
            1 => [
                'title' => 'First article title',
                'content' => '1st article text'
            ],
            2 => [
                'title' => 'Second article title',
                'content' => '2nd article text'
            ]
        ];
        return response()
            ->json($articles)
            ->header("Content-Type", "application/json")
            ->cookie("USER_COOKIE", 'John Doe', 3600);
    });

    Route::get('redirect', static function () {
        return redirect('/contact');
    });

    Route::get('redirect/back', static function () {
        return back();
    });

    Route::get('redirect/route', static function () {
        return redirect()->route('articles.show', ['id' => 1]);
    });

    Route::get('redirect/fuckyou', static function () {
        return redirect()->away('https://www.google.com');
    });
});



//Route::get('/articles/recent/{days?}', static function ($days=25) {
//    return "Articles from $days days ago";
//})->where([
//    'days' => '[0-9]+'
//]);
