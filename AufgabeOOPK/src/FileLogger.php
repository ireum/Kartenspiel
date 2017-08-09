<?php


class FileLogger implements LoggerInterface
{
    public function log(string $message, Configuration $configuration)
    {
        // TODO: Der PFad zum Logfile kommt aus der Konfiguration. Mittels Dependency Injection
        file_put_contents($configuration->getFileLoggerPath(), $message . PHP_EOL, FILE_APPEND);
//        file_put_contents('/tmp/logfile.txt', $message . PHP_EOL, FILE_APPEND);
    }
}
