### Laravel Repos

Laravelの基礎文法や興味があるライブラリを検証する為のreposです。

### 環境構築

[Docker Compose](https://github.com/docker/compose)を使って環境を構築しています。
以下起動手順です。

コンテナの構成は以下の通りです。
(※[構築PR](https://github.com/Fendo181/laravel_practice/pull/18)はこちら)

- web
  - alpine/ngnix
- app
  - alpine/php-fpm
- db
  - Debian/mysql8
  

コンテナに入る場合のそれぞれのコマンドは

#### alpine系

```sh
docker-compose exex app ash
```

#### debian系

```sh
docker-compose exex db bash
```

です。

#### docker-composeでコンテナを立ち上げる

```bash
git clone https://github.com/Fendo181/laravel_practice.git
cd docker-dev/
cp .env.example .env #環境ファイルをコピー
docker-compose up #起動 
```

#### Laravelのプロジェクトを起動する

```bash
cd myapp/
composer install
cp .env.example .env
php artisan key:generate
```

でOK。

##### DBの設定

DBに入る方法

```sql
docker-compose exec mysql bash
mysql -udefault -p #secret
```

Mysql8.0から設定が一部変更が変わったので、`php artisan migrate`をそのまま行うとエラーが起きる。
その為、mysqlに入って設定を変更する必要があります。

`.env`のmysqlの設定を以下のようにする

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=default
DB_PASSWORD=secret
```
※`DB_HOST`を`mysql`にして下さい。

ルートユーザで入る

```sql
mysql -root -p#secret
```

以下のコマンドを実行する

```sql
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'secret';
ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'root';
ALTER USER 'default'@'%' IDENTIFIED WITH mysql_native_password BY 'secret';
```

この状態でappコンテナに入り、php artisan migrateを実行する。

```sql
/myapp # php artisan migrate

Migration table created successfully.
Migrating: 2014_10_12_000000_create_users_table
Migrated:  2014_10_12_000000_create_users_table (0.07 seconds)
Migrating: 2014_10_12_100000_create_password_resets_table
Migrated:  2014_10_12_100000_create_password_resets_table (0.06 seconds)
```

ref: [MySQL 8.0以上だとphp artsian migrate時にエラーが発生する · Issue #2 · Fendo181/laravel_repos](https://github.com/Fendo181/laravel_repos/issues/2)

### 永続化されてボリュームデータを一旦削除する

`docker-compose`でデータが永続化されているため、コンテナにを落としてもデータは残ります。
しかし、一度ボリュームを削除してビルドし直したい場合は以下のコマンドを実行してください

```php
docker-compose down --volumes --rmi all
docker-compose up -d --build
```

##### ブラウザで確認する

以下のURLにアクセスすると、laravelの起動ページ表示されます。お疲れ様でした。

`http://localhost:10080/`