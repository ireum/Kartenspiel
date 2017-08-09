<?php


class CardSet
{
    /** @var Card[] */
    private $cards = [];

    public function __construct(array $colors)
    {
        $this->setUpCards($colors);
    }

    public function checkCardsForRolledColor(Color $color): bool
    {
        foreach ($this->cards as $card) {
            if ($color == $card->getColor() && !$card->getIsRevealed()) {
                $card->reveal();
                return true;
            }
        }
        return false;
    }

    public function hasAllCardsRevealed(): bool
    {
        foreach ($this->cards as $card) {
            if (!$card->getIsRevealed()) {
                return false;
            }
        }
        return true;
    }

    private function setUpCards(array $colors)
    {
        $cardCount = count($colors) - 1;
        $rndColors = array_rand($colors, $cardCount);
        for ($i = 0; $i < $cardCount; $i++) {
            array_push($this->cards, new Card($colors[$rndColors[$i]], new EchoLogger()));
        }
    }

}
