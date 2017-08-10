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
        $this->config = new Configuration('../src/conf.ini');
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
