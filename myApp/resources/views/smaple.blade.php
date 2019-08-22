<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SmapleApp</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
    <h3>Sample App</h3>
    <p>
        My Name is {{$firstName}} {{$lastName}}
    </p>
    <h3>メモ欄</h3>
    <p>
        {{$memo}}
    </p>

    <h3>Input Form</h3>
    <form action={{ url('/sample/store')}} method='POST'>
    {{ csrf_field() }}
    <div>
        <label>First Name</label><br>
        <input type="text" name="first-name" />
    </div>
    <div>
        <label>Last Name</label><br>
        <input type="text" name="last-name" />
    </div>
    <div>
        <label>Memo</label><br>
        <textarea name="memo"></textarea>
    </div>
    <div>
        <input type="submit" value="Create" />
    </div>
    </form>
    </body>
</html>
