# AsaKotsu

**朝活に特化したSNSアプリです。**
<br><br>
**URL：** https://pf.asakotsu.com/

## アプリ概要

こちらのアプリのコンセプトは、以下の２点です。

1. 朝活仲間を作り、「コツコツ」継続できる
1. 朝活習慣の「コツ」を共有して、朝活の挫折を防ぐ

基本的にはtwitterのような投稿、コメント、いいね、フォロー機能のあるSNSですが、
その他に以下のような特徴のあるアプリです。

* アプリから、朝活Zoomミーティングを作成、編集、削除できる(ZoomAPI連携)
* 目標起床時間を設定して、早起き達成日数を記録することができる
* 早起き達成日数のランキング機能（1ヶ月ごとに集計）
* 投稿にタグ付けし（カテゴリ）、「朝コツ」タグ等で朝活のコツを共有することができる

## 開発した背景

1日の時間を有意義に過ごすために、<br>
**朝活を習慣化したい！** と思ったことがきっかけです。<br>
また、身近に睡眠に関する悩みを抱えている方がいたことも影響しています。

そして、いざ朝活に挑戦してみました。が、これがなかなか難しい。<br>
* 継続できない
* モチベーションが維持できない
* 眠すぎてベッドから起き上がれない<br>

などなど、様々な課題に直面しました。<br>
<br>
そんな中、対策として<br>
* Zoomを利用した朝活に参加してみる
* 朝絶対に早起きしないといけない約束や用事を作る
* 睡眠のメカニズムについて勉強してみる<br>

等していくうちに、だんだん朝活が継続できるようになってきて、60日以上連続して6時前に起床することができました。<br>
<br>
こうした経験から、朝活をサポートできるアプリを作ってみたいと考えたことが背景にあります。

## 使用画面のイメージ
![ScreenShot_Diagram (1)](https://user-images.githubusercontent.com/58071320/99262351-35885d00-2861-11eb-9562-2cde0231e4a2.png)

## 使用技術

* __フロントエンド__
  * __Vue.js 2.6.11__
  * __jQuery 3.4.1__
  * __HTML / SCC / Sass / MDBootstrap__

* __バックエンド__
  * __PHP 7.4.9__
  * __Laravel 6.18.36__
  * __PHPUnit 8.5.8__
  * __ZoomAPI (guzzlehttp/guzzle 7.0.1)__

* __インフラ__
  * __CircleCi__
  * __Docker 19.03.12 / docker-compose 1.26.2__
  * __nginx 1.18__
  * __mysql 5.7.31__
  * __AWS__ ( EC2, ALB, ACM, S3, RDS, CodeDeploy, SNS, Chatbot, CloudFormation, Route53, VPC, EIP, IAM )

* その他使用ツール
  * Visual Studio Code
  * Postman
  * draw.io
  * Adobe XD

## AWS構成図

![AWS_Diagram](https://user-images.githubusercontent.com/58071320/98756993-eed4d600-240e-11eb-8a3a-141290e77fc9.png)

## 機能一覧

* __ユーザー登録関連__
  * 新規登録、プロフィール編集機能
  * ログイン、ログアウト機能
  * かんたんログイン機能（ゲストユーザーログイン）

* __ZoomAPI連携__
    * 朝活Zoomミーティング機能(CRUD)
      * ミーティングの新規作成、一覧表示、編集、削除機能

* __早起き達成の判定機能__
  * ユーザー毎に目標起床時刻を設定可能（4:00〜10:00まで）
  * 目標起床時間より前に投稿をすることができれば、早起き達成記録が１日分増えます。<br>
    * ※深夜過ぎ等に投稿した場合も早起き成功とならぬよう、<br>
   　  目標起床時間より3時間前に投稿しても無効になるよう対処しています。<br>
       （例）目標起床時間を07:00に設定した場合、04:00~07:00に投稿できたら早起き達成
    

* __ユーザーの早起き達成日数のランキング機能（1ヶ月毎）__

* __無限スクロール機能__ (jQuery / inview.js / ajax)

* __ユーザー投稿関連(CRUD)__

* __コメント機能__

* __タグ機能__ (Vue.js / Vue Tags Input)

* __いいね機能__ (Vue.js / ajax)

* __フォロー機能__
  - フォロー中/フォロワー一覧（ページネーション）

* __フラッシュメッセージ表示機能__ (jQuery/ Toastr)
  * 投稿、編集、削除、ログイン、ログアウト時にフラッシュメッセージを表示

* __画像アップロード機能__ (AWS S3バケット)

* __PHPUnitテスト__


## ER図
![AsaKotsu_ERD](https://user-images.githubusercontent.com/58071320/96544796-34a3f000-12e2-11eb-9dd6-c6a9f8ad9c9c.png)

| テーブル名 | 説明 |
|:-:|:-:|
| users  | 登録ユーザー情報  |
|  follows | フォロー中/フォロワーのユーザー情報  |
| achievement_days  | ユーザーが早起き達成した日付を、履歴として管理  |
| meetings  | ユーザーが作成したZoomミーティング情報  |
| articles  | ユーザー投稿の情報  |
| tags  | ユーザー投稿のタグ情報  |
| article_tags  | articleとtagsの中間テーブル  |
| likes  | 投稿への、いいねの情報  |
| comments  | ユーザー投稿への、コメントの情報  |
