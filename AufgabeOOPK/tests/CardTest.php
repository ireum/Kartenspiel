<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Card
 * @uses Color
 * @uses EchoLogger
 */
class CardTest extends TestCase
{
    /** @var Card */
    private $card;

    /** @var \LoggerInterface|PHPUnit_Framework_MockObject_MockObject */
    private $logger;

    public function  setUp()
    {
        $this->logger = $this->getMockBuilder(LoggerInterface::class)->getMock();
        $this->card = new Card(1, $this->logger);
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
        $this->logger->expects($this->once())->method('log')->with(' and revealed a card');
        $this->card->reveal();
        $this->assertSame(true, $this->card->getIsRevealed());
    }
}
