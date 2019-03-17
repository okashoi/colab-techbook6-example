<?php

namespace App\Logging;

use Illuminate\Log\Logger;
use Monolog\Processor\ProcessIdProcessor;
use Monolog\Processor\IntrospectionProcessor;
use Monolog\Processor\WebProcessor;

/**
 * Class CustomizeLogger
 * @package App\Logging
 */
class CustomizeLogger
{
    /**
     * Customize the given logger instance.
     *
     * @param  Logger  $logger
     * @return void
     */
    public function __invoke(Logger $logger)
    {
        foreach ($logger->getHandlers() as $handler) {
            // url, ip, http_method, referrer を extra に追加
            $handler->pushProcessor(new WebProcessor());
            // file, line, class, function を extra に追加
            $handler->pushProcessor(new IntrospectionProcessor(\Monolog\Logger::DEBUG, ['Illuminate\\']));
            // process_id を extra に追加
            $handler->pushProcessor(new ProcessIdProcessor());
            // process_type を extra に追加
            $handler->pushProcessor(new ProcessTypeProcessor());
        }
    }
}
