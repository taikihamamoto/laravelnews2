<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article;
use App\Http\Requests\ArticleRequest;
use App\Models\comment;

class ArticleController extends Controller
{
    // 記事一覧画面を表示
    public function index()
    {
        $article = article::orderBy('id', 'desc')->get();
        return view(
            "articles.index",
            ['article' => $article]
        );
    } //
    // 記事を投稿
    public function exeStore(ArticleRequest $request)
    {
        // 記事のデータを受け取る
        $inputs = $request->all();
        
        \DB::beginTransaction();
        try{
            // 記事を登録
            article::create($inputs);
            \DB::commit();
        }catch(\Throwable $e){
            \DB::roolback();
            abort(500);
        }
        
        return redirect(route('home'));
    } 
    // 記事を削除
    public function exeDelete($id)
    {
        if(empty($id)){
            \Session::flash('err_msg','データがありません.');
            return redirect('home');
        }
        try{
            // 対象の記事を削除
            article::destroy($id);
            // 対象記事のコメントを削除
            comment::where('news_id',$id)->delete();
        }catch(\Throwable $e){
            abort(500);
        }
        return back();
    } //
}
