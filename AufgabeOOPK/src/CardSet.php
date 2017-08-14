<?php


class CardSet
{
    /** @var Card[] */
    private $cards = [];

    public function __construct(Card ...$cards)
    {
        $this->cards = $cards;
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
}
