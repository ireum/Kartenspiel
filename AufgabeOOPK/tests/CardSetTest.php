<?php

namespace CardGame
{

    use PHPUnit\Framework\TestCase;

    /**
     * @covers \CardGame\CardSet
     * @uses   \CardGame\Card
     * @uses   \CardGame\Color
     * @uses   \CardGame\Configuration
     */
    class CardSetTest extends TestCase
    {
        /** @var CardSet */
        private $cardSet;

        public function setUp()
        {
            $this->cardSet = new CardSet(
                ...[
                    new Card(new Color('red')),
                    new Card(new Color('green')),
                    new Card(new Color('blue'))
                ]
            );
        }

        public function testHasAllCardsRevealedReturnsFalseIfNoCardsAreRevealed()
        {
            $this->assertFalse($this->cardSet->hasAllCardsRevealed());
        }

//
        public function testCheckCardsForRolledColorReturnsFalseIfNoCardInSameColor()
        {
            $color = $this->getMockBuilder(Color::class)->disableOriginalConstructor()->getMock();
            $this->assertFalse($this->cardSet->checkCardsForRolledColor($color));
        }

        public function testCheckCardsForRolledColorReturnsTrueIfCardWithSameColor()
        {
            $this->assertTrue(
                $this->cardSet->checkCardsForRolledColor(new Color('red'))
            );
        }

        public function testHasAllCardsRevealedReturnsTrueIfAllCardsAreRevealed()
        {
            $cArr = ['red', 'green', 'blue'];

            foreach ($cArr as $color) {
                $this->cardSet->checkCardsForRolledColor(new Color($color));
            }
            $this->assertTrue($this->cardSet->hasAllCardsRevealed());
        }
    }
}
