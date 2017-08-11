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

        $this->cardSet->expects($this->any())
            ->method('checkCardsForRolledColor')
            ->willReturn(true);

        $this->cardSet->expects($this->any())
            ->method('hasAllCardsRevealed')
            ->willReturn(true);

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


        $this->assertTrue($this->player->executeTurn($dice));
    }

    public function testToString()
    {
        $this->assertSame('name', $this->player->__toString());
    }


}
