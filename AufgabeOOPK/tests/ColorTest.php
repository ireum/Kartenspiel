<?php


use PHPUnit\Framework\TestCase;

class ColorTest extends TestCase
{
    /** @var Color */
    private $color;

    public function setUp()
    {
        $this->color = new Color();
    }

    public function testGetColorReturnsCorrectColors()
    {
        $this->assertSame('red', $this->color->getColor(1));
    }

    public function testGetColorWithArgumentOutOfRangeThrowsException()
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('invalid number');
        $this->color->getColor(7);
        $this->color->getColor(0);
    }
}
