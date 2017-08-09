<?php


class Configuration
{

    private $configuration;

    public function __construct(string $path)
    {
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

    public function getLogger(): array
    {
        return $this->configuration['loggerStyle'];
    }
}
