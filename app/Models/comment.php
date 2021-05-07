<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //テーブル名
    protected $table = 'comments';
    
    //　可変項目
    protected $fillable =
    [
        'id',
        'news_id',
        'text'
    ];
}
