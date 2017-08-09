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
    public function createPlayerArray(array $players, bool $fileLogger)
    {
        $arr = [];
        foreach ($players as $player) {
            array_push($arr, $this->createPlayer($player, $fileLogger));
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

    private function createPlayer(string $name, bool $fileLogger): Player
    {
        return new Player($name, $this->createLogger($fileLogger));
    }

    //TODO: kein flag -> conf file
    public function createGame(array $players, array $colors, bool $fileLogger = false)
    {
        return new Game($this->createPlayerArray($players, $fileLogger), $this->createDice($colors), $this->createLogger($fileLogger));
    }

    public function createLogger(bool $fileLogger = true): LoggerInterface
    {
        if ($fileLogger) {
            return new FileLogger();
        }
        return new EchoLogger();
    }

    public function createConfiguration(string $path): Configuration
    {
        return new Configuration($path);
    }
}
