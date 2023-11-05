# SpotifyAPIを使って現在の再生状況を取得しPHPで表示


`auth.php`

SpotifyAPIの認証

`config.php`

config.phpを作成し以下のように記述してください。

> CLIENT_IDを取得は [こちら](https://developer.spotify.com/dashboard)

```
<?php
// Spotify API

// CLIENT_IDとRedirect_URIsの設定
define('SPOTIFY_CLIENT_ID', 'ここにCLIENT_IDを記述');
define('SPOTIFY_CLIENT_SECRET', 'ここにCLIENT_SECRETを記述');
define('CALLBACK_URL', 'ここにRedirect_URIsを記述');

// スコープの設定 必要に応じて追加
define('SPOTIFY_SCOPES', serialize([
    'user-read-playback-state',
    'user-read-currently-playing'
]));
?>
```

`index.php`

取得結果を表示。

`spotify.php`

アクセストークンを受け取り、現在再生中の曲情報を返す関数

Composerを使用してライブラリのインストールが必要です。

作業ディレクトリで以下のコマンドを実行してください。

```
composer require jwilsson/spotify-web-api-php
```

vendorというフォルダが作成されます。APIの認証を行うファイルでは`vendor/autoload.php`を読み込む必要があります。

[公式ドキュメント](https://developer.spotify.com/documentation/web-api)