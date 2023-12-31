<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'detail']);
    }

    public function index()
    {
        $data = Article::latest()->paginate(5);

        return view("articles.index", [
            "articles" => $data
        ]);
    }

    public function detail($id)
    {
        $article = Article::find($id);

        return view('articles.detail', ['article' => $article]);
    }

    public function add()
    {
        $categories = Category::all();
        return view('articles.add', ['categories' => $categories]);
    }

    public function create()
    {
        $validator = validator(request()->all(), [
            "title" => "required",
            "body" => "required",
            "category_id" => "required",

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $article = new Article;
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->user_id = auth()->user()->id;
        $article->save();

        return redirect('/articles');
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/articles')->with('info', 'An article deleted');
    }

    public function edit($id)
    {
        // $validator = validator(request()->all(), [
        //     "body" => "required",
        // ]);

        // if ($validator->fails()) {
        //     return back()->withErrors($validator);
        // }
        $article = Article::find($id);
        $categories = Category::all();
        return view('articles.update', ["article" => $article, "categories" => $categories]);
    }
    public function update($id)
    {
        $validator = validator(request()->all(), [
            "title" => "required",
            "body" => "required",
            "category_id" => "required",

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $article = Article::find($id);
        $title = request()->title;
        $body = request()->body;
        $category_id = request()->category_id;
        $user_id = auth()->user()->id;
        $article->title = $title;
        $article->body = $body;
        $article->category_id = $category_id;
        $article->user_id = $user_id;
        $article->save();
        return redirect('/articles')->with('info', 'An article updated');
    }
}
