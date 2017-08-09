<?php


class Game
{
    /** @var Dice */
    private $dice;

    /** @var Player[] */
    private $players = [];

    /** @var Color[] */
    private $colors = [];

    /** @var bool */
    private $gameEnd = false;

    /** @var int */
    private $roundCounter = 0;

    /** @var LoggerInterface */
    private $logger;

    public function __construct(array $players, array $colors, LoggerInterface $logger)
    {
        $this->players = $players;
        $this->colors = $colors;
        $this->logger = $logger;
    }

    public function prepare()
    {
        $this->dice = new Dice($this->colors, new EchoLogger());

        foreach ($this->players as $player) {
            $player->setCardSet(new CardSet($this->colors));
        }
    }

    private function round()
    {
        $this->logger->log(PHP_EOL . 'Round ' . $this->roundCounter++);
        foreach ($this->players as $player) {
            $player->executeTurn($this->dice);

            if ($player->allCardsRevealed(new EchoLogger())) {
                $this->gameEnd = true;
                break;
            }
        }
        $this->logger->log(PHP_EOL);
    }

    public function play()
    {
        do {
            $this->round();
        } while (!$this->gameEnd);
    }
}
