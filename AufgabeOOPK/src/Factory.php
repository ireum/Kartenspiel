<?php

namespace CardGame {
    class Factory
    {
        /**
         * @var Configuration
         */
        private $configuration;

        public function __construct(Configuration $configuration)
        {
            $this->configuration = $configuration;
        }

        private function createColor(string $color): Color
        {
            return new Color($color);
        }

        /** @return Color[] */
        public function createDiceArray(array $colors)
        {
            $arr = [];
            foreach ($colors as $color) {
                $arr[] = $this->createColor($color);
            }
            return $arr;
        }

        /** @return Player[] */
        public function createPlayerArray()
        {
            $arr = [];
            foreach ($this->configuration->getPlayers() as $player) {
                $arr[] = $this->createPlayer($player);
            }
            return $arr;
        }

        public function createDice(): Dice
        {
            return new Dice(...$this->createDiceArray($this->configuration->getColors()));
        }

        private function createPlayer(string $name): Player
        {
            return new Player($name, $this->createLogger());
        }

        public function createGame(): Game
        {
            return new Game(
                $this->createPlayerArray(),
                $this->createDice(),
                $this->createLogger()
            );
        }

        public function createLogger(): LoggerInterface
        {
            if ($this->configuration->isFileLogger()) {
                return new FileLogger($this->configuration);
            }
            return new EchoLogger();
        }
    }
}
