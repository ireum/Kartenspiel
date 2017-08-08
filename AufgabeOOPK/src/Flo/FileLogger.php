<?php


class FileLogger implements LoggerInterface
{
    public function log(string $message)
    {
        file_put_contents('/tmp/logfile.txt', $message . PHP_EOL);
    }
}
