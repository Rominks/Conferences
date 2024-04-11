<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function show() {
        $articles = (new Article())->all();
        return view ('articles.show', [
            'articles' => $articles
        ]);
    }
}
