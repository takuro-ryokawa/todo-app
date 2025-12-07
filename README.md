<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


![Herd](https://img.shields.io/badge/Laravel_Herd-1.22.3-orange)
![PHP](https://img.shields.io/badge/PHP-8.3-blue)
![Laravel](https://img.shields.io/badge/Laravel-12.35.1-red)
![SQLite](https://img.shields.io/badge/SQLite-3-brightgreen)
![Node.js](https://img.shields.io/badge/Node.js-25.0.0-green)
![npm](https://img.shields.io/badge/npm-11.6.2-red)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.1.0-yellow)


# Todo-App

Laravelを使って作成したシンプルなTodo管理アプリです。
「仕事」「買い物」「プライベート」などカテゴリごとにTodoリストを作成し、その中でTodoを追加・管理できます。

![todo-app](public/images/todo-app.gif)


## ✨機能概要
- ユーザー登録・ログイン（Laravel Breezeを使用）
- リスト一覧画面で、各Todoリストをプレビュー表示
- リスト一覧画面から、Todoリストの追加・削除
- Todoの追加・編集・削除
- Todoの完了/未完了の切替

## 🚀動作環境
- Windows
- Laravel Herd 1.22.3
- PHP 8.3
- Laravel 12
- SQLite
- Node.js 25
- npm 11

## 🔧セットアップ手順

1.リポジトリをクローン

bash git clone https://github.com/takuro-ryokawa/todo-app

cd todo-app

2.パッケージインストール
composer install
npm install
npm run build

3.環境変数
cp .env.example .env
php artisan key:generate

4.マイグレーション実行 & 初期データ投入
php artisan migrate --seed

5.起動
URL:http://todo-app.test/

