<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers FileLogger
 */
class FileLoggerTest extends TestCase
{
    /** @var FileLogger */
    private $fileLogger;
    /** @var \PHPUnit_Framework_MockObject_MockObject|Configuration */
    private $configuration;

    public function setUp()
    {
        $this->configuration = $this->getMockBuilder(Configuration::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->fileLogger = new FileLogger($this->configuration);
    }

    public function testLogAppendsMessageIntoFileGivenFromConfiguration()
    {
        $this->configuration->expects($this->once())
                            ->method('getFileLoggerPath')
                            ->willReturn('/tmp/fileLoggerUnitTest.txt');


        $this->fileLogger->log('unitTest');

        // +Zusicherung
        // + Unittest hinterlässt keine spuren
    }
}
