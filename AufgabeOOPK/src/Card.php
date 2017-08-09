<?php


class Card
{
    /** @var Color */
    private $color;
    /** @var bool */
    private $isRevealed = false;
    /** @var LoggerInterface */
    private $logger;

    public function  __toString(): string
    {
        return $this->color . ' ' . $this->getIsRevealed();
    }

    public function __construct(Color $color, LoggerInterface $logger)
    {
        $this->color = $color;
        $this->logger = $logger;
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
