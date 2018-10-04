<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザ登録フォーム</title>
</head>
<body>
    {{ csrf_field() }}
    <form name="registform" type="text" action="/auth/register" method="post">
        {{ csrf_field() }}
        <p>
            名前:<input type="text" name="name" size="30">
        </p>
        {{--<span>{{ $erros->first('name') }}</span>--}}
        <p>
        メールアドレス:<input type="text" name="email" size="30">
        {{--<span>{{ $erros->first('email') }}</span>--}}
        </p>

        <p>
        パスワード:<input type="password" name="password" size="30">
        {{--<span>{{ $erros->first('password') }}</span>--}}
        </p>

        <p>
        パスワード(確認):<input type="password" name="password_confirmation" size="30">
        {{--<span>{{ $erros->first('password_confirmation') }}</span>--}}
        </p>

        <button type="submit" name="action" value="send">送信</button>
    </form>
</body>
</html>
