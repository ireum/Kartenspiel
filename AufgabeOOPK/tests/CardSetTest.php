<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers CardSet
 * @uses Card
 */
class CardSetTest extends TestCase
{
    /** @var Color[] */
    private $cards;
    /** @var Color[] */
    private $colors;
    /** @var CardSet */
    private $cardSet;

    public function setUp()
    {
        $colorArray = parse_ini_file('../conf.ini', true, INI_SCANNER_TYPED);

//        foreach ($colorArray as $index => $color) {
//            array_push($this->colors[$index])
//        }

        for ($i = 0; $i < 6; $i++) {
            array_push($this->colors, $this->getMockBuilder(Color::class)->disableOriginalConstructor()->getMock());
        }
        $this->cardSet = new CardSet($this->colors);
    }

//    public function testHasAllCardsRevealedReturnsFalseIfNoCardsAreRevealed()
//    {
//        $this->assertSame(false, $this->cardSet->hasAllCardsRevealed());
//    }
//
//    public function testCheckCardsForRolledColorReturnsTrueIfSameColoredCard()
//    {
//        /** @var Color $color */
//        $color = $this->getMockBuilder(Color::class)->disableOriginalConstructor()->getMock();
//        $this->assertSame(true, $this->cardSet->checkCardsForRolledColor($color));
//    }
//
//    public function testCheckCardsForRolledColorReturnsFalseIfNoCardHasTheSameColor()
//    {
//        /** @var Color $color */
//        $color = $this->getMockBuilder(Color::class)->disableOriginalConstructor()->getMock();
////        $this->assertSame(false, $this->cardSet->checkCardsForRolledColor($color));
//        $this->assertFalse($this->cardSet->checkCardsForRolledColor($color));
//    }

//    public function testHasAllCardsRevealedReturnsTrueIfAllCardsAreRevealed()
//    {
//        $color = $this->getMockBuilder(Color::class)->disableOriginalConstructor()->getMock();
//
//        $this->cardSet->checkCardsForRolledColor($color);
//        self::assertSame(true, $this->cardSet->hasAllCardsRevealed());
//    }

}
