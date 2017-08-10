<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers FileLogger
 */
class FileLoggerTest extends TestCase
{
    /** @var FileLogger */
    private $fileLogger;
    /** @var Configuration */
    private $config;

    public function setUp()
    {
        $this->config = $this->getMockBuilder(Configuration::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->fileLogger = new FileLogger($this->config);
    }

    public function testLogAppendsMessageIntoFileGivenFromConfiguration()
    {

    }
}
