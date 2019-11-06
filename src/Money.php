<?php declare(strict_types=1);

class Money
{
    /**
     * @var string
     */
    private $currency;

    /**
     * @var int
     */
    private $amount;

    public static function eur(int $amount): Money
    {
        return new Money($amount, 'EUR');
    }

    public static function usd(int $amount): Money
    {
        return new Money($amount, 'USD');
    }

    private function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public function equals(Money $that): bool
    {
        return $this->currency === $that->currency() && $this->amount === $that->amount();
    }

    public function add(Money $that)
    {
        $this->ensureSameCurrency($that);

        return new Money($this->amount + $that->amount(), $this->currency());
    }

    private function ensureSameCurrency(Money $that)
    {
        if ($this->currency !== $that->currency()) {
            throw new RuntimeException('Currency mismatch');
        }
    }
}
