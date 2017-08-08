<?php


class Game
{
    /** @var Dice */
    private $dice;

    /** @var array */
    private $players = [];

    /** @var bool */
    private $gameEnd = false;

    public function __construct(array $players)
    {
        $this->players = $players;
    }

    public function prepare()
    {
        $this->dice = new Dice();

        foreach ($this->players as $player) {
            $player->setCards();
        }
    }

    public function play()
    {
        $counter = 0;
        do {
            echo PHP_EOL . 'Round ' . $counter++;

            foreach ($this->players as $player) {
                $num = $player->rollDice($this->dice);
                $player->checkCards($num);

                if ($player->allCardsRevealed()) {
                    $this->gameEnd = true;
                    break;
                }
            }
            echo PHP_EOL;
        } while (!$this->gameEnd);
    }
}
