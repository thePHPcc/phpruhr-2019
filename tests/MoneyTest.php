<?php declare(strict_types=1);

class MoneyTest extends PHPUnit\Framework\TestCase
{
    public function test_supports_EUR(): void
    {
        $money = Money::eur(1);
        $this->assertEquals('EUR', $money->currency());
    }

    public function test_supports_USD(): void
    {
        $money = Money::usd(1);
        $this->assertEquals('USD', $money->currency());
    }

    public function test_has_amount_in_cents(): void
    {
        $money = Money::usd(100);
        $this->assertEquals(100, $money->amount());
    }

    public function test_can_be_compared(): void
    {
        $money = Money::usd(1);

        $this->assertTrue($money->equals($money));
        $this->assertFalse($money->equals(Money::usd(2)));
    }

    public function test_comparing_different_currencies_returns_false(): void
    {
        $this->assertFalse(Money::usd(1)->equals(Money::eur(1)));
    }

    public function test_can_be_added(): void
    {
        $a = Money::eur(100);
        $b = Money::eur(200);
        $result = Money::eur(300);

        $this->assertTrue($result->equals($a->add($b)));
    }

    public function test_adding_returns_new_instance(): void
    {
        $a = Money::eur(100);
        $b = Money::eur(200);

        $this->assertNotSame($a, $a->add($b));
        $this->assertNotSame($b, $a->add($b));
    }

    /**
     * Maybe this test is a little paranoid
     */
    public function test_is_immutable(): void
    {
        $a = Money::eur(100);
        $b = Money::eur(200);
        $result = $a->add($b);

        $this->assertEquals(100, $a->amount());
    }

    public function test_different_currencies_cannot_be_added(): void
    {
        $this->expectException(RuntimeException::class);

        Money::eur(1)->add(Money::usd(1));
    }
}
