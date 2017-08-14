<?php

namespace CardGame
{


    use PHPUnit\Exception;
    use PHPUnit\Framework\TestCase;
    use Prophecy\Exception\InvalidArgumentException;

    /**
     * @covers \CardGame\Color
     * @uses Exception
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

        public function testIsValidColorThrowsInvalidArgumentExceptionIfColorIsInvalid()
        {
            $this->expectException(InvalidArgumentException::class);
            $this->expectExceptionMessage('Invalid color white');
            $this->color = new Color('white');
        }

        /**
         * @dataProvider validColorProvider
         */
        public function testAllValidColors($c)
        {
            $this->assertInstanceOf(
                Color::class,
                $this->color = new Color($c)
            );
        }

        /**
         * @dataProvider invalidColorProvider
         */
        public function testSomeInvalidColors($c)
        {
            $this->expectException(InvalidArgumentException::class);
            $this->expectExceptionMessage('Invalid color ' . $c);
            $this->color = new Color($c);
        }

        public function validColorProvider()
        {
            return array(
                array('red'),
                array('green'),
                array('blue'),
                array('pink'),
                array('yellow'),
                array('orange')
            );
        }

        public function invalidColorProvider()
        {
            return array(
                array('brown'),
                array('black'),
                array('two'),
                array(0)
            );
        }
    }
}
