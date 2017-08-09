<?php


class Configuration
{
    /** @var array */
    private $configuration;

    public function __construct(string $path)
    {
        // TODO: Fehlerbehandlung bei ungültigen ini dateien
        if (parse_ini_file($path) == false) {
            throw new Exception('invalid path: ' . $path);
        }
        $this->configuration = parse_ini_file($path, true);
    }

    public function getColors(): array
    {
        return $this->configuration['colors'];
    }

    public function getPlayers(): array
    {
        return $this->configuration['players'];
    }

    public function isFileLogger(): bool
    {
        return $this->configuration['fileLogger'];
    }

    public function getFileLoggerPath(): string
    {
        return $this->configuration['fileLoggerPath'];
    }
}
