<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Game
 * @uses Player
 * @uses CardSet
 * @uses Card
 * @uses Color
 */
class GameTest extends TestCase
{
    /** @var Game */
    private $game;

    /** @var  \PHPUnit_Framework_MockObject_MockObject|Dice */
    private $dice;

    /** @var  \PHPUnit_Framework_MockObject_MockObject|LoggerInterface */
    private $logger;

    /** @var  \PHPUnit_Framework_MockObject_MockObject|Player */
    private $player;

    /** @var Player[] */
    private $players;

    public function setUp()
    {
        $this->player = $this->getMockBuilder(Player::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->dice = $this->getMockBuilder(Dice::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->logger = $this->getMockBuilder(LoggerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->players = [$this->player];

        $this->game = new Game($this->players, $this->dice, $this->logger);
    }

    public function testPrepareSetsCardSetForPlayers()
    {
        $this->game->prepare([new Color('red'), new Color('green'), new Color('blue')]);
        $this->assertNotNull($this->players[0]);
    }

    public function testPlayEndsGameIfOnePlayerRevealedAllCards()
    {
        $this->player->expects($this->once())
            ->method('executeTurn')
            ->willReturn(true);

        $this->game->play();
    }
}
