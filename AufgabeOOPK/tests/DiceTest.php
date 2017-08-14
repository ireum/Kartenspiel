<?php


use PHPUnit\Framework\TestCase;

/**
 * Class DiceTest
 * @covers Dice
 * @uses Color
 */
class DiceTest extends TestCase
{
    /** @var Dice */
    private $dice;
    /** @var Color[] */
    private $colors;

    public function setUp()
    {
        $this->colors = [new Color('red'), new Color('green'), new Color('blue')];
        $this->dice = new Dice($this->colors);
    }

    public function testRollReturnsColorFromTheColorsArray()
    {
        $this->assertContains($this->dice->roll(), $this->colors);
        $this->assertInstanceOf(Color::class, $this->dice->roll());
    }
}
