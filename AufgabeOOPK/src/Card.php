<?php


class Card
{
    /** @var int */
    private $color;
    /** @var bool */
    private $isRevealed = false;

    public function __construct(int $color)
    {
        $this->color = $color;
    }

    public function getColor(): int
    {
        return $this->color;
    }

    public function getIsRevealed(): bool
    {
        return $this->isRevealed;
    }

    public function reveal()
    {
        echo ' and revealed a card';
        $this->isRevealed = true;
    }
}
