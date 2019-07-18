<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<h1>
    ログインフォーム
</h1>
@isset($messeage)
     <p size="color:red"> {{ $message }}</p>
@endisset
<form name="loginform" action="/auth/login" method="post">
    {{ csrf_field() }}
    <p>
        メールアドレス:<input type="text" name="email" size="30" value="{{ old('email') }}">
    </p>
    <p>
        パスワード:<input type="password" name="password" size="30">
    </p>
    <button type="submit" name="action" value="send">
        ログイン
    </button>
</form>
</body>
</html>