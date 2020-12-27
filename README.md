# docker-laravel-v7-multiAuth
Docker-composeを使用したLaravelのバージョン７のプロジェクト<br>
マルチログインを日本語化したUI/UX込みで実装済み

userログイン
![user-login-docker-laravel-v7-multiAuth](https://user-images.githubusercontent.com/59963646/103163511-173f5500-4842-11eb-913f-7ee9d0982daf.png)

ハンバーガーメニュー
![humbergerMenu-docker-laravel-v7-multiAuth](https://user-images.githubusercontent.com/59963646/103163568-b2d0c580-4842-11eb-90dd-2c03223f9cfd.png)

adminログイン
![admin-login-docker-laravel-v7-multiAuth](https://user-images.githubusercontent.com/59963646/103163527-3f2eb880-4842-11eb-95eb-24aaec57d156.png)


# 開発環境
- Laravel Framework 7.30.1 
- PHP 7.4.11
- MySQL 5.7
- docker-compose 3.7

# Dockerコンテナ
- app　プロジェクト
- nginx　webサーバー
- mysql　DB
- minio　AWSのS3を想定

# 開発
- リポジトリをclone
````
git clone https://github.com/TakahiroTsukida/docker-laravel-v7-multiAuth.git
````

- docker-laravel-v7-multiAuthディレクトリに移動
````
cd docker-laravel-v7-multiAuth
````
- .envファイルがなければコピー
````
cp .env.example .env
````

## 初期設定
- dockerコンテナ起動
````
docker-compose up -d
````
- dockerコンテナ内に入る
````
docker exec -it docker-laravel-v7-multiAuth_app_1 bash
````
- 以下コンテナ内で実行
- composerインストール
````
composer install
````
- Laravel/Ui
````
composer require laravel/ui 2.*
````
- APP_KEY 生成
````
php artisan key:generate
````
- マイグレーションとテストデータ投入
````
php artisan migrate --seed
````
- npm install
````
npm install
````


# URL
|環境|URL|
|---|---|
|アプリ本体 |http://localhost|
|minio |http://localhost:9000|


# その他の使い方
- 基本的なLaravelのコマンドはコンテナ内に入って打つ方が分かりやすい
```
docker exec -it docker-laravel-v7-multiAuth_app_1 bash
```
