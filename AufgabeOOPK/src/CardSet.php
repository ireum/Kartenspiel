<?php


class CardSet
{
    /** @var Player  */
    private $owner;

    /** @var Card[] */
    private $cards = [];

    public function __construct(Player $player, array $colors)
    {
        $this->owner = $player;
        $this->setUpCards($colors);
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    private function setUpCards($colors)
    {
        $cardCount = count($colors) - 1;
        $rndColors = array_rand($colors, $cardCount);
        for ($i = 0; $i < $cardCount; $i++) {
            array_push($this->cards, new Card($colors[$rndColors[$i]], new EchoLogger()));
        }
    }

}
