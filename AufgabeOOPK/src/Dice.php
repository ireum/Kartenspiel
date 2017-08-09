<?php


class Dice
{
    /** @var Color[] */
    private $colors;

    public function __construct(array $colors)
    {
        $this->colors = $colors;
    }

    public function roll(): Color
    {
        $rndColor = $this->colors[array_rand($this->colors)];
        return $rndColor;
    }
}
