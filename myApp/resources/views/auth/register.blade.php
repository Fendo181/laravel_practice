<html>
    <head>
        <meta charset="utf-8">
    </head>
<body>
    <h1>
        ユーザ登録フォーム
    </h1>
    <form name="registfotm" action="/auth/register" method="post">
        {{-- CSRFトークン --}}
        {{ csrf_field() }}
        <p>
            お名前:<input type="text" name="name" size="30">
            <span>
                {{ $errors->first('name') }}
            </span>
        </p>
        <p>
            メールアドレス:<input type="text" name="email" size="30">
            <span>
                {{ $errors->first('email') }}
            </span>
        </p>
        <p>
            パスワード:<input type="password" name="password" size="30">
            <span>
                {{ $errors->first('password') }}
            </span>
        </p>
        <p>
            パスワード確認:<input type="password" name="password_confirmation" size="30">
            <span>
                {{ $errors->first('password') }}
            </span>
        </p>
        <button type="submit" name="action" value="send">送信</button>
    </form>
</body>
</html>