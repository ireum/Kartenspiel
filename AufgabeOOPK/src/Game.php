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

    /** @var LoggerInterface */
    private $logger;

    public function __construct(array $players, array $colors, LoggerInterface $logger)
    {
        $this->players = $players;
        $this->colors = $colors;
        $this->logger = $logger;
    }

    public function prepare(int $cardCount)
    {
        $this->dice = new Dice($this->colors, new EchoLogger());

        foreach ($this->players as $player) {
            $player->setCards($this->colors, $cardCount);
        }
    }

    public function play()
    {
        $counter = 1;
        do {
            $this->logger->log(PHP_EOL . 'Round ' . $counter++);

            foreach ($this->players as $player) {
                $player->executeTurn($this->dice);

                if ($player->allCardsRevealed(new EchoLogger())) {
                    $this->gameEnd = true;
                    break;
                }
            }
            echo PHP_EOL;
        } while (!$this->gameEnd);
    }
}
