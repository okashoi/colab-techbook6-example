<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class MyAppException
 * @package App\Exceptions
 */
abstract class MyAppException extends \Exception
{
    /**
     * @return array ログ出力時の追加情報
     */
    abstract public function getContext(): array;

    /**
     * @return int HTTP ステータスコード
     */
    abstract public function getStatusCode(): int;

    /**
     * @return string ユーザ向けのメッセージ
     */
    abstract public function getUserMessage(): string;

    /**
     * @return HttpException
     */
    public function toHttpException(): HttpException
    {
        return new HttpException(
            $this->getStatusCode(),
            $this->getUserMessage(),
            $this->getPrevious(),
            [],
            $this->code
        );
    }
}
