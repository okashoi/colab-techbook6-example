<?php

namespace App\Logging;

/**
 * Class ProcessTypeProcessor
 * @package App\Logging
 */
class ProcessTypeProcessor
{
    /**
     * @var string
     */
    private $processType;

    /**
     * ProcessTypeProcessor constructor.
     */
    public function __construct()
    {
        if (app()->runningInConsole()) {
            $this->processType = 'console';
            return;
        }

        if (app()->runningUnitTests()) {
            $this->processType = 'test';
            return;
        }

        // console, test のどちらでもなければ消去法で web
        $this->processType = 'web';
    }

    /**
     * @param array $record
     * @return array
     */
    public function __invoke(array $record): array
    {
        $record['extra']['process_type'] = $this->processType;

        return $record;
    }
}
