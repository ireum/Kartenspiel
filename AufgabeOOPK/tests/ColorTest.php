<?php


use PHPUnit\Framework\TestCase;

/**
 * @covers Color
 */
class ColorTest extends TestCase
{
    /** @var Color */
    private $color;

    public function setUp()
    {
        $this->color = new Color('red');
    }

    public function testColorReturnsColorInsertedByConstructor()
    {
        $this->expectOutputString('red');
        echo $this->color;
    }

    public function testIsValidColorThrowsInvalidArgumentExpetionIfColorIsInvalid()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid color white');
        $this->color = new Color('white');
    }
}
