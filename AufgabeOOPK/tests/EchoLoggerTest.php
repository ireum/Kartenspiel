<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers EchoLogger
 */
class EchoLoggerTest extends TestCase
{
    /** @var LoggerInterface */
    private $echoLogger;

    public function setUp()
    {

        $this->echoLogger = new EchoLogger();
    }

    public function testLogEchoesMessageInsertedByArgument()
    {
        $this->expectOutputString('foo' . PHP_EOL);
        $this->echoLogger->log('foo');
    }
}
