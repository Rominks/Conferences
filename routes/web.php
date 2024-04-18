<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\LoginController;

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


Route::get('/', static function () {
    return redirect('/articles/' . app()->getLocale());
});

Route::post('/change-locale', [LocaleController::class, 'changeLocale'])->name('change.locale');

Route::prefix('/articles')->group(static function () {
    Route::get('/{locale?}', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/view/{id}/{locale?}', [ArticleController::class, 'view'])->name('articles.view');
    Route::get('/edit/{articleId}/{locale?}', [ArticleController::class, 'edit'])->name('articles.edit')->middleware('auth');
    Route::get('/list/{locale?}', [ArticleController::class, 'listArticles'])->name('articles.list')->middleware('auth');
    Route::get('/create/{locale?}', [ArticleController::class, 'create'])->name('articles.create')->middleware('auth');
    Route::put('/update/{id}', [ArticleController::class, 'update'])->name('articles.update')->middleware('auth');
    Route::delete('/delete/{id}', [ArticleController::class, 'delete'])->name('articles.delete')->middleware('auth');
    Route::post('/submit', [ArticleController::class, 'submit'])->name('articles.submit')->middleware('auth');
    Route::redirect('/view', '/articles/all');
    Route::redirect('', '/articles/all/{locale}');
})->where(['locale' => '[a-zA-Z]{2}'])->middleware('setlocale');

Route::get('/login/{locale?}', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login.index');
Route::post('/login/submit', [App\Http\Controllers\Auth\LoginController::class, 'submit'])->name('login.submit');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');



