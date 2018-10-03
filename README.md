### Laravel Repos

Laravelの基礎文法や興味があるライブラリを検証する為のreposです。

### 環境構築

[Laradock](https://laradock.io/)を使って環境を構築します

起動


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

```bash
cd /var/www
composer create-project laravel/laravel myApp --prefer-dist "5.5.*"
```

#### 共有ディレクトリの設定

laradoc内の`.env`の`APP_CODE_PATH_HOST`を以下のように変更する。
以降はローカルとコンテナ内のプロジェクトが同期されている為ローカルで変更すると仮想環境へのコンテナ側にも反映されるようになる

```bash
APP_CODE_PATH_HOST=../myApp
```

再度起動して確認する。

```bash
docker-compose up -d nginx mysql  
```

workspacコンテナにはいる。myAppと同期されている事を確認した。

```bash
docker-compose exec --user=laradock workspace bash                  
$ ls
app  artisan  bootstrap  composer.json  composer.lock  config  database  package.json  phpunit.xml  public  readme.md  resources  routes  server.php  storage  tests  vendor  webpack.mix.js
```