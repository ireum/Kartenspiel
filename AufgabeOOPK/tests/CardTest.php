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

    /** @var Color */
    private $color;

    public function  setUp()
    {
        //$this->color = new Color('red');
        //TODO: Color Mock Obj
        $this->color = $this->getMockBuilder(Color::class)
                            ->disableOriginalConstructor()
                            ->getMock();

        $this->card = new Card($this->color);
    }

    public function testGetColorReturnsColorInsertedByConstructor()
    {
        $this->assertSame($this->color, $this->card->getColor());
    }

    public function testIsRevealedIsSetToFalseByDefault()
    {
        $this->assertFalse($this->card->isRevealed());
    }

    public function testRevealSetsIsRevealedToTrue()
    {
        $this->card->reveal();
        $this->assertTrue($this->card->isRevealed());
    }
}
