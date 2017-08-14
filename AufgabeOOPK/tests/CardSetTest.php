<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers CardSet
 * @uses   Card
 * @uses   Color
 * @uses   Configuration
 */
class CardSetTest extends TestCase
{
    /** @var CardSet */
    private $cardSet;

    public function setUp()
    {
        $this->cardSet = new CardSet([new Color('red'), new Color('green'), new Color('blue')]);
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
            $this->cardSet->checkCardsForRolledColor(new Color('red')) ||
                     $this->cardSet->checkCardsForRolledColor(new Color('blue'))
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
