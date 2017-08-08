<?php


class EchoLogger implements LoggerInterface
{
    public function log(string $message)
    {
        echo $message;
    }
}
