<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Configuration
 */
class ConfigurationTest extends TestCase
{
    /** @var Configuration */
    private $config;

    public function setUp()
    {
        $this->config = new Configuration(__DIR__ . '/data/conf.ini');
    }

    public function testIsInvalidIniFileThrowsExceptionIfInvalidIniFile()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->config = new Configuration(__DIR__ . '/data/unittest.ini');
    }

    public function testGetColorsReturnsArrayFromIniFile()
    {
        $expected = [
            'red',
            'green'
        ];

        $actual = $this->config->getColors();
        $this->assertEquals($expected, $actual);
    }

    public function testGetPlayersReturnsArrayFromIniFile()
    {
        $expected = [
            'Alice',
            'Bob'
        ];

        $actual = $this->config->getPlayers();
        $this->assertEquals($expected, $actual);
    }

    public function testIsFileLoggerReturnsBooleanFromIniFile()
    {
        $this->assertTrue($this->config->isFileLogger());
    }

    public function testGetFileLoggerPathReturnsPathFromIniFile()
    {
        $expected = '/tmp/logfile.txt';
        $actual = $this->config->getFileLoggerPath();
        $this->assertSame($expected, $actual);
    }
}
