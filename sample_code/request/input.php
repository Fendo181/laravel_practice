<?php

// php artisan tinker実行後にターミナルでご確認下さい。

$name = Input::get('name');

// nameキーがなければ、guestを入れる
$name = Input::get('name','guest');