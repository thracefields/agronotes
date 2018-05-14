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

// Pages
Route::get('/', 'PagesController@getWelcome');
Route::get('contact', 'PagesController@getContact')->middleware('auth')->name('contact');
Route::post('contact', 'PagesController@postContact')->middleware('auth')->name('contact.send');
Route::get('users', 'PagesController@getUsers')->middleware('auth');

// Tasks
Route::resource('tasks', 'TaskController', ['except' => 'destroy']);

// Auth
Auth::routes();
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

// Articles
Route::resource('/articles', 'ArticleController');
Route::get('admin/articles', 'ArticleController@admin')->name('articles.admin');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/article/{article_id}', 'ArticleController@comment')->name('articles.comment');

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});


// Profile
Route::prefix('profile')->group(function () {
    Route::get('/', 'ProfileController@index')->name('profile.index');
    Route::post('/', 'ProfileController@store')->name('profile.store');
    Route::get('/edit', 'ProfileController@edit')->name('profile.edit');
    Route::get('/{user_id}', 'ProfileController@show')->name('profile.show');
});

// Categories
Route::resource('categories', 'CategoryController', ['only' => ['index', 'store', 'edit', 'update']]);
Route::get('category/{category_id}/articles', 'CategoryController@sortArticlesByCategory')->name('categories.sort');

// Tags
Route::resource('tags', 'TagController', ['except' => ['create']]);

// Tips
Route::resource('tips', 'TipController', ['except' => ['show']]);
Route::get('/user/tips', 'TipController@getTips');

// Questions
Route::resource('questions', 'QuestionController', ['only' => ['index', 'create', 'store']]);
Route::prefix('admin/questions')->group(function () {
    Route::get('/', 'AdminQuestionController@index')->name('admin.questions');
    Route::get('/{id}/edit', 'AdminQuestionController@edit')->name('admin.questions.edit');
    Route::post('/{id}', 'AdminQuestionController@update')->name('admin.questions.update');
});

// Search
Route::get('search', 'PagesController@getSearch')->name('search');