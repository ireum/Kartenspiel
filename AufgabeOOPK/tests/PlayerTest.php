<?php


use PHPUnit\Framework\TestCase;

/**
 * Class PlayerTest
 * @covers Player
 * @uses   Dice
 * @uses   Card
 */
class PlayerTest extends TestCase
{
    /** @var Player */
    private $player;

    /** @var PHPUnit_Framework_MockObject_MockBuilder|CardSet */
    private $cardSet;

    /** @var PHPUnit_Framework_MockObject_MockBuilder|LoggerInterface */
    private $logger;

    public function setUp()
    {
        $this->cardSet = $this->getMockBuilder(CardSet::class)
            ->disableOriginalConstructor()
            ->getMock();

        $logger = $this->getMockBuilder(LoggerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->player = new Player('name', $this->logger);
    }


    
//
//    public function testSetCardSetSetsCardSet()
//    {
//
//    }

//
//    public function testGetNameReturnsNameInsertedByConstructor()
//    {
//        $this->assertSame('name', $this->player->getName());
//    }
//
//    public function testRollDiceReturnsNumberInTheCorrectRange()
//    {
//        $dice = $this->getMockBuilder(Dice::class)
//                     ->setMethods(['roll'])
//                     ->getMock();
//
//        $dice->method('roll')
//             ->willReturn(1);
//
//        $this->assertSame(1, $this->player->rollDice($dice));
//
//    }
//
//    public function testAllCardsRevealedReturnsFalseIfAllCardsAreHidden()
//    {
//
//        $this->player->setCards();
//        $this->assertSame(false, $this->player->allCardsRevealed());
//    }
//
//    public function testSetCardsSetsRightNumberOfCards()
//    {
//
//        $n = count($this->player->getCards());
//        $this->assertSame(6, $n);
//    }

}
