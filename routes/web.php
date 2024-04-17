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

Route::get('/{locale?}', [HomeController::class, 'index'])->name("home.index");

Route::get('/', static function () {
   return redirect('/en');
});

Route::prefix('/articles')->name('articles')->group(static function () {
    Route::get('/{locale?}', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/view/{id}/{locale?}', [ArticleController::class, 'view'])->name('articles.view');
    Route::get('/edit/{articleId}/{locale?}', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::get('/list/{locale?}', [ArticleController::class, 'listArticles'])->name('articles.list');
    Route::put('/update/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::redirect('/view', '/articles/all');
    Route::redirect('', '/articles/all/{locale}');
});
