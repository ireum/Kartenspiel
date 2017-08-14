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
    private $playerOne;

    /** @var  \PHPUnit_Framework_MockObject_MockObject|Player */
    private $playerTwo;

    /** @var Player[] */
    private $players;

    public function setUp()
    {
        $this->playerOne = $this->getMockBuilder(Player::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->playerTwo = $this->getMockBuilder(Player::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->dice = $this->getMockBuilder(Dice::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->logger = $this->getMockBuilder(LoggerInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->players = [$this->playerOne, $this->playerTwo];

        $this->game = new Game($this->players, $this->dice, $this->logger);
    }

    //TODO: Falsche Zusicherung. wie abfrage von cardset
    public function testPrepareSetsCardSetForPlayers()
    {
        $this->playerOne->expects($this->once())
            ->method('setCardSet');

        $this->playerTwo->expects($this->once())
            ->method('setCardSet');

        $this->game->prepare([new Color('red'), new Color('green'), new Color('blue')]);
    }

    public function testPlayEndsGameIfOnePlayerRevealedAllCards()
    {
        $this->playerOne->expects($this->once())
            ->method('executeTurn')
            ->willReturn(false);


        $this->playerTwo->expects($this->once())
            ->method('executeTurn')
            ->willReturn(true);

        $this->game->play();
    }

}
