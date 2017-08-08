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
        $arr = [1, 2, 3, 4, 5, 6];

        $this->dice = new Dice();

        foreach ($this->players as $player) {
            shuffle($arr);
            $player->setCards($arr);
//            var_dump($player->getCards($arr));
        }

//        $color = new Color();
//        foreach ($this->players as $player) {
//            $player->setCards($color->colors);
//        }
    }

    public function play()
    {
        do {
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
