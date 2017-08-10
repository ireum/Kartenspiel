<?php


interface LoggerInterface
{
    public function __construct(Configuration $conf);
    public function log(string $message);
}
