<?php


class FloColor
{
    /**
     * @var string
     */
    private $color;

    public function __construct(string $color)
    {
        $this->ensureIsValidColor($color);
        $this->color = $color;
    }

    private function ensureIsValidColor(string $color)
    {
        $validColors = ['red', 'blue', 'green'];
        if (!in_array($color, $validColors)) {
            throw new \InvalidArgumentException(sprintf('Keine gültige Farbe "%s"', $color));
        }
    }

    public function __toString()
    {
        return $this->color;
    }
}
