<?php

use Illuminate\Support\Facades\Route;

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

// 記事一覧画面を表示
Route::get('/', "ArticleController@index")->name('home');
// 記事の投稿
Route::post('/', "ArticleController@exeStore")->name('Articlestore');
// 記事の削除
Route::post('/delete/{id}',"ArticleController@exeDelete")->name('Articledelete');
// コメント一覧画面を表示
Route::get('/comment/{id}', "CommentController@index")->name('Commentpage');
// コメントの投稿
Route::post('Commentpage', "CommentController@exeStore")->name('Commentstore');
// コメントの削除
Route::post('/comment/delete/{id}', "CommentController@exeDelete")->name('Commentdelete');