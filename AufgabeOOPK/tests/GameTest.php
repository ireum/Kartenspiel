<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Game
 * @uses
 */
class GameTest extends TestCase
{
    /** @var Game */
    private $game;

    /** @var  \PHPUnit_Framework_MockObject_MockObject|Dice */
    private $dice;

    /** @var  \PHPUnit_Framework_MockObject_MockObject|LoggerInterface */
    private $logger;

    /** @var Player[] */
    private $players;

    public function setUp()
    {

        $this->dice = $this->getMockBuilder(Dice::class)
                           ->disableOriginalConstructor()
                           ->getMock();

        $this->logger = $this->getMockBuilder(LoggerInterface::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $this->players = ['p1', 'p2', 'p3'];

        $this->game = new Game($this->players, $this->dice, $this->logger);
    }

//    public function testFinishGameSetsGameEndToTrue()
//    {
//        $this->game->prepare();
//    }


}
