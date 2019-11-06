<?php declare(strict_types=1);

class CalculatorTest extends PHPUnit\Framework\TestCase
{
    /**
     * @var Calculator
     */
    private $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator;
    }

    public function testCanDivideIntegers(): void
    {
        $this->assertEquals(3, $this->calculator->divide(12, 4));
    }

    public function testCanDivideWithFloatResult(): void
    {
        $this->assertEquals(2.4, $this->calculator->divide(12, 5));
    }

    public function testZeroCanBeDivided(): void
    {
        $this->assertEquals(0, $this->calculator->divide(0, 1));
    }

    public function testExceptionWhenTryingToDivideByZero(): void
    {
        $this->expectException(RuntimeException::class);

        $this->calculator->divide(12, 0);
    }

    /**
     * This is test is indeed slightly paranoid.
     */
    public function testNonIntegersCannotBePassed(): void
    {
        $this->expectException(TypeError::class);

        $this->calculator->divide('10', 1);
    }

    public function testWeirdness(): void
    {
        $this->assertEquals(5, $this->calculator->divide((int) '5 and-some-nonsense', 1));
    }
}
