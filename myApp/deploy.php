<?php
namespace Deployer;

require 'recipe/laravel.php';
// phpdotenvを呼びすようにする
with(new \Dotenv\Dotenv(__DIR__))->load();

set('application', env('APP_NAME'));
set('repository', 'git@github.com:Fendo181/laravel_repos.git');
set('git_tty', false);
set('branch', 'master');

add('shared_files', ['.env']);
add('shared_dirs', []);
add('writable_dirs', ['bootstrap/cache', 'storage']);

host(env('DEPLOYER_MC_HOST'))
    ->stage('production')
    ->user(env('DEPLOYER_MC_USER'))
    ->port(env('DEPLOYER_MC_PORT'))
    ->identityFile('~/.ssh/id_rsa.pub')
    ->set('deploy_path', '/var/www/');

task('build', function () {
    run('cd {{release_path}} && build');
});

// .envをアップロードする
task('upload:env', function () {
    upload('.env', '{{deploy_path}}/shared/.env');
})->desc('.envをアップロード');

// サブディレクトリでcomposer installを実行するようにする
task('change_cwd', function () {
    $subdir = get('release_path') . DIRECTORY_SEPARATOR . 'myApp';
    set('release_path', $subdir);
    run('cd {{release_path}}');
})->desc('デプロイ先をmyAppにする');



before('deploy:shared','upload:env');

after('deploy:update_code', 'change_cwd');

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.
before('deploy:symlink', 'artisan:migrate');