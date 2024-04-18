<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function index(string $locale = null): View
    {
        $this->validateLocale($locale);

        $articles = Article::all();

        return view('articles.index', [
            'locale' => $locale,
            'articles' => $articles
        ]);
    }

    public function view(int $articleId, string $locale = null): View
    {
        $this->validateLocale($locale);

        $article = Article::findOrFail($articleId);

        return view('articles.view', [
            'article' => $article
        ]);
    }

    public function create(string $locale = null): View
    {
        $this->validateLocale($locale);
        return view('articles.create');
    }

    public function submit(Request $request): RedirectResponse
    {
        $article = new Article();

        $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'attendance' => 'required|integer',
            'content' => 'required|string',
            'dateTime' => 'required|date'
        ]);

        $article->fill($request->input());

        $article->save();

        $request->session()->flash('status', 'Article was created');

        return redirect()->route('articles.list', ['locale' => App::getLocale()])->with('success', 'Article created successfully');
    }

    public function edit(int $articleId, string $locale = null): View
    {
        $this->validateLocale($locale);
        $article = Article::findOrFail($articleId);

        return view('articles.edit', [
            'article' => $article
        ]);
    }

    public function update(Request $request, int $articleId): void
    {
        $article = Article::findOrFail($articleId);

        $request->validate([
            'title' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'attendance' => 'required|integer',
            'content' => 'required|string',
            'dateTime' => 'required|date'
        ]);

        $article->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'updated_at' => now()
        ]);

        Log::channel('daily')->info('Article:' . $articleId . " updated " . date('H:i:s', time()));

//        return redirect()->route('articles.edit', ['locale' => App::getLocale(), 'articleId' => $articleId])->with('success', 'Article updated successfully.');
    }

    public function delete(Request $request): void
    {
        Article::destroy($request->input('id'));

//        return redirect()->route('articles.list', ['locale' => App::getLocale()])->with('success', 'Article deleted successfully.');
    }

    public function listArticles(string $locale = null): View
    {
        $this->validateLocale($locale);
        $articles = Article::all();

        return view('articles.list', [
            'locale' => $locale,
            'articles' => $articles
        ]);
    }
}
