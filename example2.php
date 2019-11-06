<?php

/**
 * Kundennummer (positiver int)
 */

$customerNumber = new CustomerNumber(-4711);
doSomethingElse($customerNumber);

function doSomething(CustomerNumber $customerNumber)
{
    doSomethingElse($customerNumber);
}

function doSomethingElse(CustomerNumber $customerNumber)
{
    var_dump($customerNumber);
}

class CustomerNumber
{
    private $customerNumber;

    public function __construct(int $customerNumber)
    {
        $this->ensureIsPositive($customerNumber);

        $this->customerNumber = $customerNumber;
    }

    public function increment(): void
    {
        $this->customerNumber++;
    }

    public function asInt(): int
    {
        return $this->customerNumber;
    }

    /**
     * @param int $customerNumber
     */
    private function ensureIsPositive(int $customerNumber): void
    {
        if ($customerNumber < 0) {
            throw new OutOfBoundsException;
        }
    }
}
