<?php

class Color
{
    /** @var Color */
    private $color;

    public function __construct(string $color)
    {
        $this->isValidColor($color);
        $this->color = $color;
    }

    public function isValidColor(string $color)
    {
        $validColors = ['red', 'green', 'blue', 'pink', 'yellow', 'orange'];
        if (!in_array($color, $validColors)) {
            throw new InvalidArgumentException(sprintf('Invalid color "%s', $color));
        }
    }

    public function __toString(): string
    {
        return $this->color;
    }
}
