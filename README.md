### Laravel Repos

Laravelの基礎文法や興味があるライブラリを検証する為のreposです。

### 環境構築

[Laradock](https://laradock.io/)を使って環境を構築しています。
以下起動手順です。


#### docker-composeでコンテナを立ち上げる

```bash
# laradocをcloneしてくる
git clone https://github.com/Laradock/laradock.git
cd laradoc
docker-compose up -d nginx mysql workspace phpmyadmin  
```

#### workspaceコンテナに入り、laravelのプロジェクトを作成する

コンテナへログイン
※予め用意されている`laradock`ユーザでログインする。
```bash
docker-compose  exec --user=laradock workspace bash

```

Laravelのプロジェクトを新規作成する。
`-prefer-dist`で作成するlaravelの`version`を指定する事ができます。

```bash
cd /var/www
composer create-project laravel/laravel myApp --prefer-dist "5.5.*"
```

#### 共有ディレクトリの設定

laradoc内の`.env`の`APP_CODE_PATH_HOST`を以下のように変更する。
こうする事でローカルとコンテナ内のプロジェクトが同期されている為ローカルで変更すると仮想環境へのコンテナ側にも反映されるようになります。

```bash
APP_CODE_PATH_HOST=../myApp
```

再度起動して確認する。

```bash
docker-compose up -d nginx mysql  
```

workspacコンテナにはいる。

```bash
docker-compose exec --user=laradock workspace bash                  
$ ls
app  artisan  bootstrap  composer.json  composer.lock  config  database  package.json  phpunit.xml  public  readme.md  resources  routes  server.php  storage  tests  vendor  webpack.mix.js
```

##### ブラウザで確認する

以下のURLにアクセスすると、laravelの起動ページ表示されます。お疲れ様でした。


`http://localhost/`

### Databaseの設定

ここで議論されているように`mysql 8.0`以上だと`php artisan migrate`実行時にエラーが発生します。

[SQLSTATE[HY000] [2054] The server requested authentication method unknown to the client · Issue #1392 · laradock/laradock](https://github.com/laradock/laradock/issues/1392#issuecomment-409612243)

対策として、まずアプリケーションの`.env`ファイルの`DB_HOST`をmysqlコンテナに合わせて変更します。

```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=default
DB_USERNAME=default
DB_PASSWORD=secret
```

次にmsyqlコンテナに入り、ユーザの権限を変更します。

mysqlコンテナに入る。

```bash
$ docker-compose exec mysql bash
$ mysql -u root -p 
```

ユーザの権限を変更する

```sql
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';
ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'root';
ALTER USER 'default'@'%' IDENTIFIED WITH mysql_native_password BY 'secret';
```

これで`php artisan migrate`が実行できます。
