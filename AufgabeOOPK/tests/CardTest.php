<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Card
 * @uses Color
 */
class CardTest extends TestCase
{
    /** @var Card */
    private $card;

    public function  setUp()
    {
        $this->card = new Card(1);
    }

    public function testGetColorReturnsColorInsertedByConstructor()
    {
        $this->assertSame(1, $this->card->getColor());
    }

    public function testIsRevealedIsSetToFalseByDefault()
    {
        $this->assertSame(false, $this->card->getIsRevealed());
    }

    public function testRevealSetsIsRevealedToTrue()
    {
        $this->card->reveal();
        $this->assertSame(true, $this->card->getIsRevealed());
        $this->expectOutputString(' and revealed a card', $this->card->getIsRevealed());
    }
}
