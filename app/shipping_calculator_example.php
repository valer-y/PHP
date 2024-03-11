<?php

require __DIR__ . "/../vendor/autoload.php";

use App\Services\Shipping\BillableWeightCalculatorService;

$package = [
    'weight' => 6,
    'dimensions' => [
        'width' => 9,
        'length' => 15,
        'height' => 7
    ]
];

$packageDimanesions = new \App\Services\Shipping\PackageDimension(
    $package['dimensions']['width'],
    $package['dimensions']['height'],
    $package['dimensions']['length'],
);

$billableWeight = (new BillableWeightCalculatorService())->calculate(
    $packageDimanesions,
    new \App\Services\Shipping\Weight($package['weight']),
    \App\Services\Shipping\DimDivisor::FEDEX;
);

echo $billableWeight . ' lb' . PHP_EOL;