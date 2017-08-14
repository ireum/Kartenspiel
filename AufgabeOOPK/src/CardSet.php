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
            if ($color == $card->getColor() && !$card->isRevealed()) {
                $card->reveal();
                return true;
            }
        }
        return false;
    }

    public function hasAllCardsRevealed(): bool
    {
        foreach ($this->cards as $card) {
            if (!$card->isRevealed()) {
                return false;
            }
        }
        return true;
    }

    private function setUpCards(array $colors)
    {
        foreach ($colors as $color) {
            $this->cards[] = new Card($color);
        }
    }
}
