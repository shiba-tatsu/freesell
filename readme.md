<p align="center"><img src="https://laraheroherotest.s3-ap-northeast-1.amazonaws.com/ZQcblx8Tfr3V7KoX75pVSWgVJvtr93WgC5QlDwAZ.png" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## freesellについて

このアプリケーションは、フリーマーケット用の通販サイトです。  
PHPではよく通販のサイトの開発がされているようなので、今まで学習してきたことの、アウトプットも兼ねて作成することとしました。  
学習サイトやブログのコピーアンドペーストをするのではなく、できるだけ自分で必要な機能を考えたりコードを書くことを意識しました。  
  
## freesellの機能一覧

1. 新規登録、ログイン機能  
2. 商品投稿・編集・削除
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
