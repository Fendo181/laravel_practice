<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $tables = 'articles';

    protected $fillable = [
        'user_id', 'content', 'title',
    ];
}
