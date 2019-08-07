<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    // 任意のカラムをprimary keyにする事ができる
    protected $primaryKey = 'id';
}
