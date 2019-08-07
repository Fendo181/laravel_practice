<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    // 任意のカラムをprimary keyにする事ができる
    protected $primaryKey = 'id';

    // ホワイトリスト方式
    protected $fillable = [
        'name',
        'kana'
    ];

//    $fillableと$guardedは同時には使えない
//    protected $guarded;
}
