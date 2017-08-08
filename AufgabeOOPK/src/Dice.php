<?php


class Dice
{
    public function __construct()
    {

    }

    public function roll(Player $player): int
    {
        $rndNum = rand(1, 6);
        $colorString = (new Color())->getColor($rndNum);
        echo PHP_EOL . $player->getName() . " rolled " . $colorString;
        return $rndNum;
    }
}
