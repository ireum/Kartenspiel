<?php


class Player
{
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
        foreach ($this->cards as $card) {
            if ($color === $card->getColor() && !$card->getIsRevealed()) {
                $card->reveal();
            }
        }
    }

    public function allCardsRevealed(LoggerInterface $logger): bool
    {
        foreach ($this->cards as $card) {
            if (!$card->getIsRevealed()) {
                return false;
            }
        }
        $logger->log(' and won the game');
        return true;
    }

    public function setCards(array $colors, int $cardCount)
    {
        // Spieler "bekommt" Karten. (Hier nimmt er sie sich selber / erzeugt sie sich selber)
        $rndColors = array_rand($colors, $cardCount);

        for ($i = 0; $i < $cardCount; $i++) {
            array_push($this->cards, new Card($colors[$rndColors[$i]], new EchoLogger()));
        }
    }


}
