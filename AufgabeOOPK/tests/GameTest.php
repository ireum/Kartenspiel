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

    /** @var  Dice */
    private $dice;

    /** @var  LoggerInterface */
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

        $this->players = 

        $this->game = new Game();
    }

}
