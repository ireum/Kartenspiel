<?php


class Player
{
    /** @var string */
    private $name;

    /** @var array */
    private $cards = [];

    public function __construct(string  $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function rollDice(Dice $dice): int
    {
        $num = $dice->roll($this);
        return $num;
    }

    public function allCardsRevealed()
    {
        foreach ($this->cards as $card) {
            if (!$card->getIsRevealed()) {
                return false;
            }
        }
        echo ' and has won the game';
        return true;
    }

    public function checkCards(int $color)
    {
        foreach ($this->cards as $card) {
            if ($color == $card->getColor() && !$card->getIsRevealed()) {
                $card->reveal();
            }
        }
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function setCards(array $cardColorArray)
    {
        foreach ($cardColorArray as $num) {
            array_push($this->cards, new Card($num));
        }
    }


}
