# Sharing-Calendar
ユーザー間でお互いの予定を共有できるサービス。
旅行や飲み会といったお互いの予定合わせに便利。

# DEMO
![README3](https://user-images.githubusercontent.com/87964992/135718104-b31f82ab-111f-457e-b47d-2f0dd6b6ba9b.gif)


# Features
・メール認証機能付き
・ログインにおけるGoogleアカウント連携
・ユーザー同士の予定を同時に表示することができる。
・GoogleCalendarから本アプリにイベント情報を取り込むことができる。
・表示を更新後、Shareボタンで該当するユーザーと直接コンタクトをとれる。


# Dependency
- React
- PHP 8.0.7
- Laravel 6.0
- PostgreSQL
- Bootstrap
- Heroku


# Usage
- https://sharing-calendar.herokuapp.com/ にアクセス
- デモユーザーでログイン
    - Mail: `ryota@example.com`
    - Password: `passwordryota`
- 上のセレクトボックスで表示したい友人を選択して更新ボタンを選択。
- Google 連携DEMO
    - Mail: `calendar.sharing.1228@gmail.com`
    - APIキー: `AIzaSyBizdwh0D_bpT-zn_SMrZTm3FYwHVaZLz0`
- 「取得して保存」ボタンでGoogleから取り込むことができる。


# Note
・実際に自分のGoogle calendarとの連携においては、Google Calendarにおける一般公開設定が必要。（APIキーは上記のを使用可能）

