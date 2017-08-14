<?php

namespace CardGame
{

    use PHPUnit\Framework\TestCase;

    /**
     * @covers \CardGame\Player
     * @uses   \CardGame\Dice
     * @uses   \CardGame\Card
     * @uses   \CardGame\LoggerInterface
     */
    class PlayerTest extends TestCase
    {
        /** @var Player */
        private $player;


        /** @var  \PHPUnit_Framework_MockObject_MockObject|CardSet */
        private $cardSet;

        /** @var \PHPUnit_Framework_MockObject_MockBuilder|LoggerInterface */
        private $logger;

        public function setUp()
        {
            $this->cardSet = $this->getMockBuilder(CardSet::class)
                ->disableOriginalConstructor()
                ->getMock();

            $this->logger = $this->getMockBuilder(LoggerInterface::class)
                ->disableOriginalConstructor()
                ->getMock();

            $this->player = new Player('name', $this->logger);
            $this->player->setCardSet($this->cardSet);
        }

        public function testExecuteTurn()
        {
            $dice = $this->getMockBuilder(Dice::class)
                ->disableOriginalConstructor()
                ->getMock();

            $this->cardSet->expects($this->once())
                ->method('checkCardsForRolledColor')
                ->willReturn(true);

            $this->cardSet->expects($this->once())
                ->method('hasAllCardsRevealed')
                ->willReturn(true);


            $this->logger->expects($this->once())
                ->method('log')
                ->with($this->equalTo('name rolled  and revealed a card and won the game.'));

            $this->assertTrue($this->player->executeTurn($dice));
        }

        public function testExecuteTurnDoesNotEndGame()
        {
            $dice = $this->getMockBuilder(Dice::class)
                ->disableOriginalConstructor()
                ->getMock();

            $this->cardSet->expects($this->once())
                ->method('checkCardsForRolledColor')
                ->willReturn(false);

            $this->cardSet->expects($this->once())
                ->method('hasAllCardsRevealed')
                ->willReturn(false);

            $this->logger->expects($this->once())
                ->method('log')
                ->with($this->equalTo('name rolled '));

            $this->assertFalse($this->player->executeTurn($dice));
        }

        public function testToString()
        {
            $this->assertSame('name', $this->player->__toString());
        }


    }
}
