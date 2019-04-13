# 「開発・運用を楽にする Laravel tips 集」に出てくるソースコード集

このリポジトリでは[技術書展6](https://techbookfest.org/event/tbf06)にて頒布された技術同人誌「[CoLabユーザーで技術書を書いてみた](https://techbookfest.org/event/tbf06/circle/36070001)」の第 1 章「開発・運用を楽にする Laravel tips 集」に掲載したソースコードを公開しています。

* [リスト 1.1: `composer.json` に追記する内容](1aba617) (p.4)
* [リスト 1.2: `artisan ide-helper:models 実行後の `app/User.php`（先頭部分）](8a3ab01) (p.5)
* [リスト 1.3: `Debugbar::info()` を使った値の確認（routes/web.php に記述）](f42dd45) (p.9)
* [リスト 1.4: `process_type` を出力するための独自 Processor (`app/Logging/ProcessTypeProcessor.php`)](c293541) (p.12)
* [リスト 1.5: Logger に 各種 Processor を設定するクラス (`app/Logging/CustomizeLogger.php`)](af2c0ce) (p.13)
* [リスト 1.6: `config/logging.php` 内の目的の channel に `tap` を追加](89f8765) (p.14)
* [リスト 1.8: slack 通知をするための `config/logging.php` の編集内容](935f7a7) (p.17)
* [リスト 1.9: 独自例外の抽象基底クラス (`app/Exceptions/MyAppException.php`)](4700720) (p.19)
* [リスト 1.10: 独自例外の具象クラス (`app/Exceptions/ServerErrorException.php`)](00fd572) (p.20)
* [リスト 1.11: 独自例外を処理するための `app/Exceptions/Handler.php` の追記内容](00bac40) (p.21)
* [リスト 1.12: エラー画面用の Blade テンプレート (`resources/views/500.blade.php`)](bdc3089) (p.24)
