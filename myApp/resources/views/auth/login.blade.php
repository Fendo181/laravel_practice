<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログインフォーム</title>
</head>
<body>
<h1>ログインフォーム</h1>
@isset($message)
    <p style="color:red">{{ $message }}</p>
@endisset

<form name="loginform" action="/auth/login" method="post">
    {{ csrf_field() }}
    <p>
        メールアドレス:<input type="text" name="email" size="30" value="{{ old('email') }}">
    </p>
    <p>
        パスワード:<input type="password" name="password" size="30" value="{{ old('password') }}">
    </p>
    <button type="submit" name="action" value="send">ログイン</button>
</form>
</body>
</html>
