<?php
require 'Basket.php';

// Product catalogue: Product Code => Product Details
$productCatalogue = [
    'R01' => ['price' => 32.95],
    'G01' => ['price' => 24.95],
    'B01' => ['price' => 7.95]
];

// Delivery charge rules: ['limit' => Threshold, 'charge' => Delivery Charge]
$deliveryChargeRules = [
    ['limit' => 90, 'charge' => 0],
    ['limit' => 50, 'charge' => 2.95],
    ['limit' => PHP_INT_MIN, 'charge' => 4.95]
];

// Offers: ['product code' => offer details]
$offers = [
    'R01' => [
        'type' => 'half_price',
        // Offer type
        'value' => 1,
        // Number of items eligible for the offer
        'percent' => 0.5 // Discount offer percent 0.5 => 50%, 1 => 100%
    ],
    // Add more offers here if needed
];

$basket = new Basket($productCatalogue, $deliveryChargeRules, $offers);

$basket->add('B01');
$basket->add('G01');

$total = $basket->total();
echo "Total cost: $" . number_format($total, 2);

?>