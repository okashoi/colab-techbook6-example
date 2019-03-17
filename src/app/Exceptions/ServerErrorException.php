<?php

namespace App\Exceptions;

use Throwable;

/**
 * Class ServerErrorException
 * @package App\Exceptions
 */
class ServerErrorException extends MyAppException
{
    /**
     * @var array
     */
    protected $context;

    /**
     * ServerErrorException constructor.
     * @param array $context
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(array $context = [], string $message = '', int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->context = $context;
    }

    /**
     * @return array ログ出力時の追加情報
     */
    public function getContext(): array
    {
        return $this->context;
    }

    /**
     * @return int HTTP ステータスコード
     */
    public function getStatusCode(): int
    {
        return 500;
    }

    /**
     * @return string ユーザ向けのメッセージ
     */
    public function getUserMessage(): string
    {
        return 'サーバエラーが発生しました。もう一度同じ操作をお試しください。問題が解消しない場合は、お問い合わせ窓口よりご報告をお願いいたします。';
    }
}
