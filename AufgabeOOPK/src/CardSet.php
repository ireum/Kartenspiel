<?php


class CardSet
{
    /** @var Player  */
    private $owner;

    /** @var Card[] */
    private $cards = [];

    public function __construct(Player $player)
    {
        $this->owner = $player;
    }

}
