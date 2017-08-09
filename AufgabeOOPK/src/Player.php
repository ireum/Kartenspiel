<?php


class Player
{
    /** @var CardSet */
    private $cardSet;

    /** @var string */
    private $name;

    /** @var Card[] */
    private $cards = [];

    /** @var LoggerInterface */
    private $logger;

    public function __construct(string $name, LoggerInterface $logger)
    {
        $this->name = $name;
        $this->logger = $logger;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function executeTurn(Dice $dice): bool
    {
        $color = $this->rollDice($dice);
        $logString = $this->name . ' rolled ' . $color;
        if ($this->cardSet->checkCardsForRolledColor($color)) {
            $logString = $logString . ' and revealed a card';
        }



        if ($this->cardSet->hasAllCardsRevealed()) {
            $logString = $logString . ' and won the game.';
        }
        $this->logger->log($logString);
        return $this->cardSet->hasAllCardsRevealed();
    }

    private function rollDice(Dice $dice): Color
    {
        return $dice->roll();
    }

    public function setCardSet(CardSet $cardSet)
    {
        $this->cardSet = $cardSet;
    }

}
