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
cp env-example .env
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

##### DBの設定

Mysql8.0から設定が一部変更が変わったので、`php artisan migrate`をそのまま行うとエラーが起きる。
その為、mysqlに入って設定を変更する必要があります。

```sql
docker-compose exec mysql bash
mysql -u root -p  #secret
```

以下のコマンドを実行する

```sql
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';
ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'root';
ALTER USER 'default'@'%' IDENTIFIED WITH mysql_native_password BY 'secret';
```

この状態でworkspaceブランチに入り、php artisan migrateを実行する。

```sql
root@fe37a2b5e984:/var/www# php artisan migrate
Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table
```

ref: [MySQL 8.0以上だとphp artsian migrate時にエラーが発生する · Issue #2 · Fendo181/laravel_repos](https://github.com/Fendo181/laravel_repos/issues/2)

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
