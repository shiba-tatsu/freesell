<p align="center"><img src="https://i.gyazo.com/5d8e517d5b5749f743af726b0a38181f.png" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## freesellについて
v
このアプリケーションは、フリーマーケット用の通販サイトです。  
PHPではよく通販のサイトの開発がされているようなので、今まで学習してきたことの、アウトプットも兼ねて作成することとしました。  
学習サイトやブログのコピーアンドペーストをするのではなく、できるだけ自分で必要な機能を考えたりコードを書くことを意識しました。  

## freesellの機能一覧

1. 新規登録、ログイン機能  
2. 商品投稿・編集・削除k
3. 商品お気に入り機能
4. クレジットカード機能
5. 商品購入機能
6. 商品レビュー機能
7. 出品者とユーザーでのリアルタイムチャット機能
8. googleログイン
9. 商品検索、絞り込み検索

## freesellの技術一覧

### インフラ
MAMP, AWS(EC2), CircleCI  

### フロントエンド 
Bootstrap4, Sass, jQuery, Vue.js, webpack  

### バッグエンド 
PHP, Laravel  

### API 
Goodle, Pusher, stripe  

### テスト 
PHPUnit

### ライブラリ

composer  

kalnoy/nestedset (テーブル内を階層構造化、商品カテゴリーで使用)  
laravel/socialite (googleログインで使用)  
league/flysystem-aws-s3-v3 (awsのS3に画像を投稿する際に使用)  
pusher/pusher-php-server (リアルタイムチャット機能で使用)

npm  

vue-js-modal(モーダルウインドウを作成する際に使用)  
vue-star-rating(商品評価機能で、星の数でレビューを投稿する際に使用)  
laravel-echo, pusher-js(pusherを使用しての、リアルタイムチャット機能で使用)

## freesellの使い方

1. ヘッダーのRegisterをクリック  
2. 必要な情報を記入し、アカウント作成  
3. ヘッダーのユーザー名をクリックし、ユーザー詳細のクレジットカード登録をクリック  
4. クレジットカード情報を新規登録ボタンをクリックし、登録画面でカード番号に「4242 4242 4242 4242」、セキュリティコードに「123」、有効期限に「12/21」、カード名義に「テスト」と記入し、カードを登録するボタンをクリックする  
5. ヘッダーの商品を出品するをクリック  
6. 画像を投稿し、必要な情報を記入し商品を出品  
7. ヘッダーの商品検索フォームに何も記入せずにクリックし、最後のページをクリックすると先ほど投稿した商品が表示されるので、そちらをクリック  
8. 商品詳細画面で編集ボタン、削除ボタンが表示されるので、そちらをクリックすると編集や削除が可能  
9. 商品検索ボタンをクリックすると、画面左側に絞り込み検索機能があり、そちらをクリックすると絞り込み検索が可能  
10. 現在ログインしているアカウント以外で投稿した商品をクリック  
11. 商品詳細画面のハートボタンをクリックするとお気に入りが可能  
12. 出品者に相談するボタンをクリックするとチャット画面に遷移し、メッセージを入力した後Enterを押すことでチャットが可能  
13. 商品詳細画面でレビューを書くボタンをクリックすることで、レビューの投稿が可能  
14. 商品詳細画面で商品の数量を選択し、購入ボタンをクリックすると、商品購入画面に遷移
15. 必要な情報を記入し、購入するボタンをクリックすることで、商品を購入できる
16. ヘッダーのユーザー名をクリックし、ログアウトボタンをクリックすることでログアウトが可能

## SQL

### itemsテーブル
|Column|Type|
|------|----|
|name|string|
|status|integer|
|body|text|
|price|integer|
|fee|integer|
|region|string|
|delivery_day|integer|
|quantity|integer|
|seller_id|bigInteger|

### Association
- has_many :images
- has_many :payments
- has_many :reviews
- belongs_to :users
- belongs_to :categories
- belongs_to_many :likes

### imagesテーブル
|Column|Type|
|------|----|
|image|string|
|item_id|bigInteger|

### Association
- belongs_to :items

### reviewsテーブル
|Column|Type|
|------|----|
|star|float|
|title|string|
|body|text|
|user_id|bigInteger|
|item_id|bigInteger|

### Association
- belongs_to :items
- belongs_to :users

### likesテーブル
|Column|Type|
|------|----|
|user_id|bigInteger|
|item_id|bigInteger|

### Association
- belongs_to_many :items
- belongs_to_many :users

### paymentsテーブル
|Column|Type|
|------|----|
|item_id|bigInteger|
|user_id|bigInteger|
|name|string|
|postal|string|
|rigion|integer|
|city|string|
|address|string|
|phoneNumber|string|
|quantity|integer|

### Association
- belongs_to :items
- belongs_to :users

### categoriesテーブル
|Column|Type|
|------|----|
|name|string|
|_lft|integer|
|_rgt|integer|
|parent_id|integer|

### Association
- has_many :items

### chat_rooms
|Column|Type|
|------|----|
|user_id|bigInteger|
|seller_id|bigInteger|

### Association
- belongs_to :users

### chat_messages
|Column|Type|
|------|----|
|chat_room_id|bigInteger|
|user_id|bigInteger|
|massage|string|

### Association
- belongs_to :chat_rooms
- belongs_to :users

### usersテーブル
|Column|Type|Options|
|------|----|-------|
|email|string|
|password|string|
|name|string|
|status|integer|nullable|
|stripe_id|string|unique, nullable|

### Association
- has_many :items
- has_many :reviews
- has_many :chat_rooms
- has_many :chat_messages
- has_many :payments
- belongs_to_many :likes
