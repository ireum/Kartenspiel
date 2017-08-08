<?php


use PHPUnit\Framework\TestCase;

/**
 * Class DiceTest
 * @covers Dice
 * @uses Player
 * @uses Color
 */
class DiceTest extends TestCase
{
    /** @var Dice */
    private $dice;

    public function setUp()
    {
        $this->dice = new Dice();
    }

    public function testDiceReturnsNumberInCorrectRange()
    {
        $player = $this->getMockBuilder(Player::class)
                       ->disableOriginalConstructor()
                       ->getMock();

        $this->assertLessThan(7, $this->dice->roll($player));
        $this->assertGreaterThan(0, $this->dice->roll($player));
    }
}
