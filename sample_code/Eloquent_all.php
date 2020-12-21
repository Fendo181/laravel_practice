<?php


//php artisan tinker実行後に

$authors = \App\Author::all();

foreach ($authors as $author) {
    echo $author->name;
    echo PHP_EOL;
}

