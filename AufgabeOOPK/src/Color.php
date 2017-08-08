<?php

class Color
{
    /** @var array */
    private $colors = array(
        1 => 'red',
        2 => 'green',
        3 => 'blue',
        4 => 'pink',
        5 => 'yellow',
        6 => 'brown'
    );

    public function getColor(int $number): string
    {
        return $this->colors[$number];
    }
}
