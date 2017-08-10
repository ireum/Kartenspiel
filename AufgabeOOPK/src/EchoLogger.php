<?php


class EchoLogger implements LoggerInterface
{
    public function __construct(Configuration $conf)
    {

    }

    public function log(string $message)
    {
        echo $message . PHP_EOL;
    }
}
