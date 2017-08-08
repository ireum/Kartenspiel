<?php


class Player
{
    /** @var CardSet */
    private $cardSet;

    public function setCardSet(CardSet $cardSet)
    {
        $this->cardSet = $cardSet;
    }

    public function getCardSet()
    {
        return $this->cardSet;
    }






    /** @var string */
    private $name;

    /** @var Card[] */
    private $cards = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function executeTurn(Dice $dice)
    {
        $color = $this->rollDice($dice);
        $this->checkCards($color);
    }

    private function rollDice(Dice $dice): Color
    {
        $color = $dice->roll($this);
        return $color;
    }

    private function checkCards(Color $color)
    {
        foreach ($this->cardSet->getCards() as $card) {
//            echo PHP_EOL . 'VD ___________________________' . PHP_EOL;
//            var_dump($card);
            if ($color === $card->getColor() && !$card->getIsRevealed()) {
                $card->reveal();
            }
        }


        foreach ($this->cards as $card) {
            if ($color === $card->getColor() && !$card->getIsRevealed()) {
                $card->reveal();
            }
        }
    }

    public function allCardsRevealed(LoggerInterface $logger): bool
    {
        foreach ($this->cardSet->getCards() as $card) {
            if (!$card->getIsRevealed()) {
                return false;
            }
        }
        $logger->log(' and won the game');
        return true;
    }




//    public function setCards(array $colors)
//    {
//        // Spieler "bekommt" Karten. (Hier nimmt er sie sich selber / erzeugt sie sich selber)
//        $cardCount = count($colors) - 1;
//        $rndColors = array_rand($colors, $cardCount);
//
//        for ($i = 0; $i < $cardCount; $i++) {
//            array_push($this->cards, new Card($colors[$rndColors[$i]], new EchoLogger()));
//        }
//    }


}
