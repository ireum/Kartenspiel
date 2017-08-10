<?php

class Factory
{
    private function createColor(string $color): Color
    {
        return new Color($color);
    }

    /** @return Color[] */
    public function createDiceArray(array $colors)
    {
        $arr = [];
        foreach ($colors as $color) {
            array_push($arr, $this->createColor($color));
        }
        return $arr;
    }

    /** @return Player[] */
    public function createPlayerArray(array $players, Configuration $conf)
    {
        $arr = [];
        foreach ($players as $player) {
            array_push($arr, $this->createPlayer($player, $conf));
        }
        return $arr;
    }

    public function createCardSet(array $colors): CardSet
    {
        return new CardSet($colors);
    }

    public function createDice(array $colors): Dice
    {
        return new Dice($this->createDiceArray($colors));
    }

    private function createPlayer(string $name, Configuration $conf): Player
    {
        return new Player($name, $this->createLogger($conf));
    }

    public function createGame(array $players, array $colors, Configuration $conf)
    {
        return new Game($this->createPlayerArray($players, $conf), $this->createDice($colors), $this->createLogger($conf));
    }

    public function createLogger(Configuration $conf): LoggerInterface
    {
        if ($conf->isFileLogger()) {
            return new FileLogger($conf);
        }
        return new EchoLogger($conf);
    }

    public function createConfiguration(string $path): Configuration
    {
        return new Configuration($path);
    }
}
