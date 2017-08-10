<?php


class FileLogger implements LoggerInterface
{
    /** @var Configuration */
    private $conf;

    public function __construct(Configuration $conf)
    {
        $this->conf = $conf;
    }

    public function log(string $message)
    {
        file_put_contents($this->conf->getFileLoggerPath(), $message . PHP_EOL, FILE_APPEND);
    }
}
