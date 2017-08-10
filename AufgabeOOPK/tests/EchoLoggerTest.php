<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers EchoLogger
 */
class EchoLoggerTest extends TestCase
{
    /** @var LoggerInterface */
    private $echoLogger;
    /** @var Configuration */
    private $config;

    public function setUp()
    {
        $this->config = $this->getMockBuilder(Configuration::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        $this->echoLogger = new EchoLogger($this->config);
    }

    public function testLogEchoesMessageInsertedByArgument()
    {
        $this->expectOutputString('foo' . PHP_EOL);
        $this->echoLogger->log('foo');
    }
}
