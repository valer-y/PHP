<?php

declare(strict_types=1);

namespace App\Services\Shipping;

class BillableWeightCalculatorService
{
    public function calculate(
        PackageDimension $packageDimension,
        Weight $weight,
        DimDivisor $dimDivisor
    ) : int
    {
        match (true) {
            $dimDivisor <= 0 => throw new \InvalidArgumentException('Invalid DIM divisor'),
            default => true
        };


        $dimWeight = (int) round($packageDimension->width * $packageDimension->height * $packageDimension->length / $dimDivisor->value);

        return max($weight->value, $dimWeight);
    }
}