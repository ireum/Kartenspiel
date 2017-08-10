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
        $this->colors = [];
        for ($i = 0; $i < 6; $i++) {
            array_push($this->colors, $this->getMockBuilder(Color::class)->disableOriginalConstructor()->getMock());
        }

        $this->dice = new Dice($this->colors);
    }

    public function testRollReturnsAColorFromTheColorsArray()
    {
        $this->assertEquals($this->colors[0], $this->dice->roll());
    }
}
