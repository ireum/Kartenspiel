<?php


use PHPUnit\Framework\TestCase;

/**
 * Class PlayerTest
 * @covers Player
 * @uses Dice
 * @uses Card
 */
class PlayerTest extends TestCase
{
    /** @var Player */
    private $player;

    public function setUp()
    {
        $this->player = new Player('name');
    }
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
