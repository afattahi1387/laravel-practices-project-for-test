<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Article;

class MainController extends Controller
{
    public function home() {
        $categories = Category::all();
        $articles = Article::where('name', 'like', 'Article2')->get();
        if(isset($request['search']) && !empty($request['search'])) {
            $articles = Article::where('name', 'like', $request['search'])->get();
        } else {
            $articles = Article::orderBy('id', 'DESC')->paginate(5);
        }
        return view('main_views.home', ['articles' => $articles, 'categories' => $categories]);
    }

    public function search(Request $request) {
        if(!isset($request['search']) || empty($request['search'])) {
            abort(404);
        }

        $articles = Article::where('name', $request['search'])->get();
        return view('main_views.search', ['articles' => $articles, 'searched_word' => $request['search']]);
    }

    public function get_category_articles($category_id) {
        $category = Category::find($category_id);
        $articles = Category::find($category_id)->articles;
        $all_categories = Category::all();
        return view('main_views.category_articles', ['articles' => $articles, 'all_categories' => $all_categories, 'category' => $category]);
    }

    public function single_article($article_id) {
        $article = Article::find($article_id);
        $categories = Category::all();
        $comments = Article::find($article_id)->comments;
        return view('main_views.single_article', ['article' => $article, 'categories' => $categories, 'comments' => $comments]);
    }
}
