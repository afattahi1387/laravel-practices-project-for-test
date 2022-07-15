<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\InsertArticleRequest;
use App\Http\Requests\UploadImageRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateArticleRequest;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $categories = Category::all();

        if (isset($_GET['edit-category']) && !empty($_GET['edit-category'])) {
            $category = Category::find($_GET['edit-category']);
        } else {
            $category = null;
        }

        return view('dashboard.index', ['categories' => $categories, 'category_for_edit' => $category]);
    }

    public function add_category(Request $request)
    {
        Category::create([
            'category_name' => $request['category_name']
        ]);

        return redirect()->route('dashboard');
    }

    public function edit_category(Request $request, Category $category)
    {
        $new_category_name = $request['category_name'];
        $category->update([
            'category_name' => $new_category_name
        ]);
        return redirect()->route('dashboard');
    }

    public function delete_category(Category $category)
    {
        $category->delete();
        return redirect()->route('dashboard');
    }

    public function articles()
    {
        $articles = Article::orderBy('id', 'DESC')->get();
        return view('dashboard.dashboard_articles', ['articles' => $articles]);
    }

    public function add_article_page()
    {
        $categories = Category::all();
        return view('dashboard.add_article_page', ['categories' => $categories]);
    }

    public function insert_article(InsertArticleRequest $request)
    {
        $article = Article::create([
            'name' => $request['name'],
            'short_description' => $request['short_description'],
            'long_description' => $request['long_description'],
            'writer' => 'ali',
            'category_id' => $request['category_id'],
            'image' => ''
        ]);

        return redirect()->route('image.add', ['article_id' => $article->id]);
    }

    public function add_image($article_id)
    {
        $article = Article::find($article_id);
        return view('dashboard.add_image', ['article' => $article]);
    }

    public function upload_image(UploadImageRequest $request, $article_id)
    {
        $imagePath = $request->image->path();
        $imageName = $request->image->getClientOriginalName();
        $imageNewName = $article_id . '_' . $request->image->getClientOriginalName();
        move_uploaded_file($imagePath, 'uploads/articles_images/' . $imageName);
        rename('uploads/articles_images/' . $imageName, 'uploads/articles_images/' . $imageNewName);
        copy('uploads/articles_images/' . $imageNewName, 'images/articles_images/' . $imageNewName);
        unlink('uploads/articles_images/' . $imageNewName);
        Article::find($article_id)->update([
            'image' => $imageNewName
        ]);

        return redirect()->route('single.article', ['article_id' => $article_id]);
    }

    public function move_to_trash($article_id)
    {
        $article_image = Article::find($article_id)->image;
        copy('images/articles_images/' . $article_image, 'images/trash_images/' . $article_image);
        unlink('images/articles_images/' . $article_image);
        Article::find($article_id)->delete();
        return redirect()->route('trash');
    }

    public function trash()
    {
        $articles = Article::orderBy('deleted_at', 'DESC')->onlyTrashed()->get();
        return view('dashboard.trash', ['articles' => $articles]);
    }

    public function article_recovery($article_id)
    {
        $article = Article::onlyTrashed()->find($article_id);
        copy('images/trash_images/' . $article->image, 'images/articles_images/' . $article->image);
        unlink('images/trash_images/' . $article->image);
        $article->restore();
        return redirect()->route('dashboard.articles');
    }

    public function delete_article($article_id)
    {
        $article = Article::find($article_id);
        if(empty($article)) {
            $article = Article::onlyTrashed()->find($article_id);
        }
        $article_image = $article->image;
        if (empty($article->deleted_at)) {
            $article_image_address = 'images/articles_images/' . $article_image;
            $route = 'dashboard.articles';
        } else {
            $article_image_address = 'images/trash_images/' . $article_image;
            $route = 'trash';
        }
        unlink($article_image_address);
        $article->forceDelete();
        return redirect()->route($route);
    }

    public function edit_article_page($article_id) {
        $categories = Category::all();
        $article = Article::find($article_id);
        return view('dashboard.edit_article_page', ['article' => $article, 'categories' => $categories]);
    }

    public function update_article(UpdateArticleRequest $request, Article $article) {
        $name = $request->name;
        $short_description = $request->short_description;
        $long_description = $request->long_description;
        if(!empty($request->image)) {
            $imagePath = $request->image->path();
            $imageName = $request->image->getClientOriginalName();
            $imageNewName = $article->id . '_' . $request->image->getClientOriginalName();
            move_uploaded_file($imagePath, 'uploads/articles_images/' . $imageName);
            rename('uploads/articles_images/' . $imageName, 'uploads/articles_images/' . $imageNewName);
            copy('uploads/articles_images/' . $imageNewName, 'images/articles_images/' . $imageNewName);
            unlink('uploads/articles_images/' . $imageNewName);
            unlink('images/articles_images/' . $article->image);
            $image = $imageNewName;
        } else {
            $image = $article->image;
        }
        $category_id = $request->category_id;
        $article->update([
            'name' => $name,
            'short_description' => $short_description,
            'long_description' => $long_description,
            'image' => $image,
            'category_id' => $category_id
        ]);

        return redirect()->route('single.article', ['article_id' => $article->id]);
    }
}
