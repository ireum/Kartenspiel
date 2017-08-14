<?php

namespace CardGame
{
    class EchoLogger implements LoggerInterface
    {
        public function log(string $message)
        {
            echo $message . PHP_EOL;
        }
    }
}
