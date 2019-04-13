# 「開発・運用を楽にする Laravel tips 集」に出てくるソースコード集

このリポジトリでは[技術書展6](https://techbookfest.org/event/tbf06)にて頒布された技術同人誌「[CoLabユーザーで技術書を書いてみた](https://techbookfest.org/event/tbf06/circle/36070001)」の第 1 章「開発・運用を楽にする Laravel tips 集」に掲載したソースコードを公開しています。

また Docker Compose がインストールされている環境では実際に動かして動作を確認することができます。
併せて活用してください。

## ソースコード（コミット）へのリンク

* [リスト 1.1: `composer.json` に追記する内容](https://github.com/okashoi/colab-techbook6-example/commit/1aba617) (p.4)
* [リスト 1.2: `artisan ide-helper:models` 実行後の `app/User.php`（先頭部分）](https://github.com/okashoi/colab-techbook6-example/commit/8a3ab01) (p.5)
* [リスト 1.3: `Debugbar::info()` を使った値の確認（`routes/web.php` に記述）](https://github.com/okashoi/colab-techbook6-example/commit/f42dd45) (p.9)
* [リスト 1.4: `process_type` を出力するための独自 Processor (`app/Logging/ProcessTypeProcessor.php`)](https://github.com/okashoi/colab-techbook6-example/commit/c293541) (p.12)
* [リスト 1.5: Logger に 各種 Processor を設定するクラス (`app/Logging/CustomizeLogger.php`)](https://github.com/okashoi/colab-techbook6-example/commit/af2c0ce) (p.13)
* [リスト 1.6: `config/logging.php` 内の目的の channel に `tap` を追加](https://github.com/okashoi/colab-techbook6-example/commit/89f8765) (p.14)
* [リスト 1.8: slack 通知をするための `config/logging.php` の編集内容](https://github.com/okashoi/colab-techbook6-example/commit/935f7a7) (p.17)
* [リスト 1.9: 独自例外の抽象基底クラス (`app/Exceptions/MyAppException.php`)](https://github.com/okashoi/colab-techbook6-example/commit/4700720) (p.19)
* [リスト 1.10: 独自例外の具象クラス (`app/Exceptions/ServerErrorException.php`)](https://github.com/okashoi/colab-techbook6-example/commit/00fd572) (p.20)
* [リスト 1.11: 独自例外を処理するための `app/Exceptions/Handler.php` の追記内容](https://github.com/okashoi/colab-techbook6-example/commit/00bac40) (p.21)
* [リスト 1.12: エラー画面用の Blade テンプレート (`resources/views/500.blade.php`)](https://github.com/okashoi/colab-techbook6-example/commit/bdc3089) (p.24)

## （付録）Docker Compose で動作させる手順

リポジトリ全体のディレクトリ構造は以下のとおりです。

```bash
./
 |-- services/          # Docker イメージビルド用のファイル等が入っている
 |-- src/               # ソースコード
 :  :
 |  |-- .env.example    # Laravel 用の .env ファイルのテンプレート
 :  :
 |-- .env.example       # Docker Compose 用の .env ファイルのテンプレート（上記のものとは別）
 :
 |-- docker-compose.yml
 :
```

まずは各自に依存する値を設定します。
リポジトリルート直下の `.env.exmaple` をコピーして `.env` という名前のファイルを作成し、コメント（`#` で始まる行）に従って内容を編集してください。
既に自身の環境で 80 番ポートや 3306 番ポートを使っている人は `HTTP_PORT` や `MYSQL_PORT` に別の利用可能なポート番号を指定しましょう。

```bash
$ cp .env.example .env

$ vim .env
```

ちなみに `USER_ID` および `GROUP_ID` に設定する値は以下のコマンドで確認できます（Linux/Mac の場合）。

```bash
$ id -u
500

$ id -g
500
```

この状態で下記コマンドを実行すると

* 各 Docker イメージのビルドとコンテナの起動
* composer パッケージのインストール
* アプリケーションキー の生成
* データベースマイグレーション

の順で実行されます。

```bash
$ make setup
```

実行が完了したら http://localhost （`.env` の `HTTP_PORT` を変えている場合はそのポート番号も指定）でページを閲覧できます。

また、`composer` や `artisan` を実行したい場合は

```bash
$ docker-compose run --rm php-cli bash
```

コマンドを実行しコンテナ内に入って実行するか、`make` コマンドを経由して実行しましょう。

```bash
# 例: composer dumpautoload
$ make composer CMD=dumpautoload

# 例: php artisan migrate
$ make artisan CMD=migrate
```
