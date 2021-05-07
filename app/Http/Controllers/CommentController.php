<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article;
use App\Models\comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    // コメント一覧画面を表示
    public function index($id)
    {
        // 対象の記事を取得
        $article = article::find($id);
        if (is_null($article)) {
            \Session::flash('err_msg', 'データがありません.');
            return redirect('home');
        }
        // 対象のコメントを取得
        $comment = comment::orderBy('id', 'desc')->get();
        return view(
            "articles.comment",
            ['article' => $article],
            ['comment' => $comment]
        );
    } //
    // コメントを投稿
    public function exeStore(CommentRequest $request)
    {
        // 記事のデータを取得
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            // 記事を登録
            comment::create($inputs);
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::roolback();
            abort(500);
        }

        return back();
    } //
    // コメントを削除
    public function exeDelete($id)
    {
        if (empty($id)) {
            \Session::flash('err_msg', 'データがありません.');
            return redirect('Commentpage');
        }
        try {
            // 対象のコメントをを削除
            comment::destroy($id);
        } catch (\Throwable $e) {
            abort(500);
        }
        return back();
    } //
}
