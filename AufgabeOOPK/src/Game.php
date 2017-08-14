<?php

namespace CardGame
{
    class Game
    {
        /** @var Dice */
        private $dice;

        /** @var Player[] */
        private $players = [];

        /** @var bool */
        private $gameEnd = false;

        /** @var int */
        private $roundCounter = 1;

        /** @var LoggerInterface */
        private $logger;

        public function __construct(array $players, Dice $dice, LoggerInterface $logger)
        {
            $this->players = $players;
            $this->dice = $dice;
            $this->logger = $logger;
        }

        /** @return Card[] */
        private function prepareCards(array $colors): array
        {
            $rndColorArray = array_rand($colors, count($colors) - 1);

            $returnArray = [];
            foreach ($rndColorArray as $num) {
                $returnArray[] = new Card($colors[$num]);
            }

            return $returnArray;
        }

        public function prepare(array $colors)
        {
            foreach ($this->players as $player) {
                $player->setCardSet(new CardSet(...$this->prepareCards($colors)));
            }
        }

        private function round()
        {
            $this->logger->log(PHP_EOL . 'Round ' . $this->roundCounter++);
            foreach ($this->players as $player) {
                if ($player->executeTurn($this->dice)) {
                    $this->finishGame();
                    break;
                }
            }
        }

        public function play()
        {
            do {
                $this->round();
            } while (!$this->isGameFinished());
        }

        private function isGameFinished(): bool
        {
            return $this->gameEnd;
        }

        private function finishGame()
        {
            $this->gameEnd = true;
        }
    }
}
