<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Configuration
 * @uses
 */
class ConfigurationTest extends TestCase
{
    /** @var Configuration */
    private $config;

    public function setUp()
    {
        $this->config = new Configuration(__DIR__ . '/../src/conf.ini');
    }

    public function testDummy()
    {
        $this->assertTrue(true);
    }

//    public function testGetColorReturnsArrayParsedFromIniFile()
//    {
//
//    }

//    public function testIsValidIniFileThrowsExceptionWhenFilePathIsInvalid()
//    {
//        $this->expectException(Exception::class);
//        $this->expectExceptionMessage('invalid ini file: test.txt');
//
//        $this->config = new Configuration('test.txt');
//    }
}
