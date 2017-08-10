<?php


use PHPUnit\Framework\TestCase;

/**
 * Class FactoryTest
 * @covers Factory
 * @uses Color
 * @uses Dice
 * @uses EchoLogger
 * @uses FileLogger
 * @uses Game
 * @uses Player
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
        $expected = new Dice($this->factory->createDiceArray($this->configuration->getColors()));
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
        $expected = new EchoLogger($this->configuration);
        $actual = $this->factory->createLogger();
        $this->assertEquals($expected, $actual);
    }

    public function testFileLoggerCanBeCreated()
    {
        $expected = neW FileLogger($this->configuration);

        $this->configuration->expects($this->once())
                            ->method('isFileLogger')
                            ->willReturn(true);

        $actual = $this->factory->createLogger();
    }

//    public function testPlayerArrayCanBeCreated()
//    {
//        $logger = $this->getMockBuilder(LoggerInterface::class)->disableOriginalConstructor()->getMock();
//
//        $expected = [
//            new Player('Alice', $logger),
//            new Player('Bob', $logger),
//            new Player('Carol', $logger)
//        ];
//
//        $actual = $this->factory->createPlayerArray();
//        var_dump($actual);
//        exit();
//
//        $this->assertEquals($expected, $actual);
//    }
}
