<?php


//php artisan tinker実行後に

$authors = \App\Author::all();

echo $authors->count();
