<?php


class Configuration
{
    /** @var array */
    private $configuration;

    public function __construct(string $path)
    {
        if (parse_ini_file($path, true, INI_SCANNER_TYPED) == false) {
            throw new Exception('invalid ini file: ' . $path);
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
