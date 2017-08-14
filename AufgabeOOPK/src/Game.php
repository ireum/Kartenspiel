<?php


class Game
{
    /** @var Dice */
    private $dice;

    /** @var Player[] */
    private $players = [];

    /** @var bool */
    private $gameEnd = false;

    /** @var int */
    private $roundCounter = 1;

    /** @var LoggerInterface */
    private $logger;

    public function __construct(array $players, Dice $dice, LoggerInterface $logger)
    {
        $this->players = $players;
        $this->dice = $dice;
        $this->logger = $logger;
    }

//    private function setPlayerCardSet(array $colors)
//    {
//        $rndColors = array_rand($colors, count($colors) - 1);
//
//        foreach ($rndColors as $rc) {
//
//            $this->cards[] = new Card($colors[$rc]);
//        }
//    }

    private function prepareGameColors(array $colors)
    {
        var_dump($colors);
        $rndColorArray = array_rand($colors, count($colors) - 1);

        $returnArray = [];
        foreach ($rndColorArray as $num) {
            $returnArray[] = $colors[$num];
        }

        return $returnArray;
    }

    public function prepare(array $colors)
    {
        $this->prepareGameColors($colors);

        foreach ($this->players as $player) {
            $player->setCardSet(new CardSet($this->prepareGameColors(($colors))));
        }
    }

    private function round()
    {
        $this->logger->log(PHP_EOL . 'Round ' . $this->roundCounter++);
        foreach ($this->players as $player) {
            if ($player->executeTurn($this->dice)) {
                $this->finishGame();
                break;
            }
        }
    }

    public function play()
    {
        do {
            $this->round();
        } while (!$this->isGameFinished());
    }

    private function isGameFinished(): bool
    {
        return $this->gameEnd;
    }

    private function finishGame()
    {
        $this->gameEnd = true;
    }
}
