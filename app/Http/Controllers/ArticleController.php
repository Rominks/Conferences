<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

    public function create(): View
    {
        return view('articles.create');
    }

    public function submit(Request $request): RedirectResponse
    {
        $article = new Article();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'content' => 'nullable|string'
        ]);

        $article->fill($request->input());

        $article->save();

        $request->session()->flash('status', 'Article was created');

        return redirect()->route('articles.list', App::getLocale())->with('success', 'Article created successfully');
    }

    public function edit(int $articleId, string $locale = null): View
    {
        $this->validateLocale($locale);
        $article = Article::findOrFail($articleId);

        return view('articles.edit', [
            'article' => $article
        ]);
    }

    public function update(Request $request, int $articleId): RedirectResponse
    {
        $article = Article::findOrFail($articleId);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'content' => 'nullable|string'
        ]);

        $article->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'updated_at' => now()
        ]);

        return redirect()->route('articles.list', ['locale' => 'en'])->with('success', 'Article updated successfully.');
    }

    public function delete(int $articleId): RedirectResponse
    {
        Article::destroy($articleId);

        return redirect()->route('articles.list', ['locale' => App::getLocale()])->with('success', 'Article deleted successfully.');
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

    private function validateLocale(string $locale = null): void
    {
        if ($locale !== null && !in_array($locale, ['en', 'lt'])) {
            abort(403);
        }
        $locale !== null ? App::setLocale($locale) : App::setLocale('en');
    }
}
