<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@home');

Route::get('/search', 'MainController@search');

Route::get('/category/{category_id}', 'MainController@get_category_articles')->name('category.articles');

Route::get('/single-article/{article_id}', 'MainController@single_article')->name('single.article');

Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

Route::post('/add-category', 'DashboardController@add_category')->name('category.add');

Route::put('/edit-category/{category}', 'DashboardController@edit_category')->name('category.edit');

Route::delete('/delete-category/{category}', 'DashboardController@delete_category')->name('category.delete');

Route::prefix('panel')->group(function() {
    Route::get('/articles', 'DashboardController@articles')->name('dashboard.articles');

    Route::get('/add-article', 'DashboardController@add_article_page')->name('dashboard.articles.add');

    Route::post('/insert-article', 'DashboardController@insert_article')->name('article.insert');

    Route::get('/add-image/{article_id}', 'DashboardController@add_image')->name('image.add');

    Route::post('/upload-image/{article_id}', 'DashboardController@upload_image')->name('image.upload');

    Route::delete('/move-to-trash/{article_id}', 'DashboardController@move_to_trash')->name('move.to.trash');

    Route::get('/trash', 'DashboardController@trash')->name('trash');

    Route::get('/article-recovery/{article_id}', 'DashboardController@article_recovery')->name('article.recovery');

    Route::delete('/delete-article/{article_id}', 'DashboardController@delete_article')->name('article.delete');

    Route::get('/edit-article/{article_id}', 'DashboardController@edit_article_page')->name('article.edit');

    Route::put('/update-article/{article}', 'DashboardController@update_article')->name('article.update');
});
