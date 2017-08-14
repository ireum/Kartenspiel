<?php

namespace CardGame
{

    use PHPUnit\Framework\TestCase;

    /**
     * @covers \CardGame\Card
     * @uses   \CardGame\Color
     */
    class CardTest extends TestCase
    {
        /** @var Card */
        private $card;

        /** @var Color */
        private $color;

        public function setUp()
        {
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
}
