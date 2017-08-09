<?php


class Card
{
    /** @var Color */
    private $color;
    /** @var bool */
    private $isRevealed = false;

    public function  __toString(): string
    {
        return $this->color . ' ' . $this->getIsRevealed();
    }

    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    public function getColor(): Color
    {
        return $this->color;
    }

    public function getIsRevealed(): bool
    {
        return $this->isRevealed;
    }

    public function reveal()
    {
        $this->isRevealed = true;
    }
}
