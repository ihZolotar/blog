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

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::paginate(3);
    return view('welcome', compact('posts'));
});
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::get('/tag/{tag}', "FilterController@tagPage")->name('tagPage');
Route::get('/posts/create', "HomeController@create");
Route::get('/posts/{post}', "HomeController@show");
Route::post('/post', "HomeController@store")->name('post');
Route::get('/posts/{post}/edit', "HomeController@edit");
Route::patch('/posts/{post}', "HomeController@update")->name('posts.update');
Route::delete('/posts/{post}', "HomeController@destroy");
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
