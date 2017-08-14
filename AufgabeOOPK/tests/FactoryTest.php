<?php

namespace CardGame
{

    use PHPUnit\Framework\TestCase;

    /**
     * @covers \CardGame\Factory
     * @uses   \CardGame\Color
     * @uses   \CardGame\Dice
     * @uses   \CardGame\EchoLogger
     * @uses   \CardGame\FileLogger
     * @uses   \CardGame\Game
     * @uses   \CardGame\Player
     */
    class FactoryTest extends TestCase
    {
        /** @var Factory */
        private $factory;

        /** @var \PHPUnit_Framework_MockObject_MockObject|Configuration */
        private $configuration;

        protected function setUp()
        {
            $this->configuration = $this->getMockBuilder(Configuration::class)->disableOriginalConstructor()->getMock();

            $this->factory = new Factory(
                $this->configuration
            );
        }

        public function testColorArrayCanBeCreated()
        {
            $expected = [
                new Color('red'),
                new Color('blue'),
                new Color('green'),
            ];

            $actual = $this->factory->createDiceArray(['red', 'blue', 'green']);

            $this->assertEquals($expected, $actual);
        }

        public function testDiceCanBeCreated()
        {
            $colors = ['red', 'green'];

            $this->configuration
                ->expects($this->once())
                ->method('getColors')
                ->willReturn($colors);

            $expected = new Dice(...$this->factory->createDiceArray($colors));
            $actual = $this->factory->createDice();
            $this->assertEquals($expected, $actual);
        }

        public function testPlayerArrayCanBeCreated()
        {
            $expected = [
                new Player('P1', $this->factory->createLogger()),
                new Player('P2', $this->factory->createLogger()),
                new Player('P3', $this->factory->createLogger())
            ];

            $this->configuration->expects($this->once())
                ->method('getPlayers')
                ->willReturn(['P1', 'P2', 'P3']);

            $actual = $this->factory->createPlayerArray();
            $this->assertEquals($expected, $actual);
        }

        public function testGameCanBeCreated()
        {
            $expected = new Game(['p1', 'p2', 'p3'], $this->factory->createDice(), $this->factory->createLogger());

            $this->configuration->expects($this->once())
                ->method('getPlayers')
                ->willReturn(['p1', 'p2', 'p3']);


            $actual = $this->factory->createGame();
            $this->assertEquals($expected, $actual);
        }

        public function testEchoLoggerCanBeCreated()
        {
            $this->assertInstanceOf(
                EchoLogger::class,
                $this->factory->createLogger()
            );
        }

        public function testFileLoggerCanBeCreated()
        {
            $this->configuration->expects($this->once())
                ->method('isFileLogger')
                ->willReturn(true);

            $this->assertInstanceOf(
                FileLogger::class,
                $this->factory->createLogger()
            );
        }
    }
}
