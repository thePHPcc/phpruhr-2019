<?php declare(strict_types=1);

class Calculator
{
    public function divide(int $dividend, int $divisor): float
    {
        if ($divisor === 0) {
            throw new RuntimeException('Division by zero');
        }

        return $dividend / $divisor;
    }
}
