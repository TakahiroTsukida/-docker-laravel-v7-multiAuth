# docker-laravel-v7-multiAuth
Docker-composeを使用したLaravelのバージョン７のプロジェクト<br>
マルチログインを日本語化したUI/UX込みで実装済み

# 開発環境
- Laravel Framework 7.30.1 
- PHP 7.4.11
- MySQL 5.7
- docker-compose 3.7

# Dockerコンテナ
- app　プロジェクト
- nginx　webサーバー
- mysql DB
- minio AWSのS3を想定

# 開発
- リポジトリをclone
````
git clone https://github.com/TakahiroTsukida/-docker-laravel-v7-multiAuth.git
````

- docker-laravel-v7-multiAuthディレクトリに移動
````
cd docker-laravel-v7-multiAuth
````

## 初期設定
- dockerコンテナ内に入る
````
docker exec -it laravel_sample_app_1 bash
````

- npm install
````
npm install
````

- マイグレーションとテストデータ投入
````
php artisan migrate --seed
````
- 必要に応じてLaravel/Uiを取り込む
````
composer require laravel/ui 2.*
````

# URL
|環境|URL|
|---|---|
|アプリ本体 |http://localhost|
|minio |http://localhost:9000|


# その他の使い方
- 基本的なLaravelのコマンドはコンテナ内に入って打つ方が分かりやすい
```
docker exec -it laravel_sample_app_1 bash
```
