<?php


class Dice
{
    /** @var Color[] */
    private $colors;
    /** @var LoggerInterface */
    private $logger;

    public function __construct(array $colors, LoggerInterface $logger)
    {
        $this->colors = $colors;
        $this->logger = $logger;
    }

    public function roll(Player $player): Color
    {
        $rndColor = $this->colors[array_rand($this->colors)];
        $this->logger->log(PHP_EOL . $player . " rolled " . $rndColor);
        return $rndColor;
    }
}
