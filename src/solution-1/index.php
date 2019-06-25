<?php

/** @license
 *  Copyright 2019 critterbots
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

/**
 * @author Rafael Gutiérrez Martínez
 * @since 1.0
 * @version 1.0
 * @package solution-2
 */

/**
 * @var array $samples List of sample input data for the three inputs defined in the requirement as test cases.
 * Each item in the array contains another associative array with units, description, unit price, sales tax quote
 * and sales duty quote (both taxes expressed by the range [0, 1], in ex: 10% -> 0.1).
 */
$samples = [
    [
        [ 'units' => 1, 'description' => 'book', 'price' => 12.49, 'tax' => 0, 'duty' => 0 ],
        [ 'units' => 1, 'description' => 'music CD', 'price' => 14.99, 'tax' => 0.1, 'duty' => 0 ],
        [ 'units' => 1, 'description' => 'chocolate bar', 'price' => 0.85, 'tax' => 0, 'duty' => 0 ]
    ],
    [
        [ 'units' => 1, 'description' => 'imported box of chocolates', 'price' => 10.00, 'tax' => 0, 'duty' => 0.05 ],
        [ 'units' => 1, 'description' => 'imported bottle of perfume', 'price' => 47.50, 'tax' => 0.1, 'duty' => 0.05 ]
    ],
    [
        [ 'units' => 1, 'description' => 'imported bottle of perfume', 'price' => 27.99, 'tax' => 0.1, 'duty' => 0.05 ],
        [ 'units' => 1, 'description' => 'bottle of perfume', 'price' => 18.99, 'tax' => 0.1, 'duty' => 0 ],
        [ 'units' => 1, 'description' => 'packet of headache pills', 'price' => 9.75, 'tax' => 0, 'duty' => 0 ],
        [ 'units' => 1, 'description' => 'box of imported chocolates', 'price' => 11.25, 'tax' => 0, 'duty' => 0.05 ]
    ]
];

/* Iterates each sample input */
for ($i = 0; $i < count($samples); $i++) {
    $input = $samples[$i];
    echo 'Output ' . ($i + 1) . ":\n";
    /** @var float $gross Cumulative variable for gross price. */
    $gross = 0;
    /** @var float $taxes Cumulative variable for taxes. */
    $taxes = 0;
    /* Iterates each line of current sample. */
    foreach ($input as $line) {
        /* Inline calculation of line gross price and add result to cumulative variable $gross. */
        $gross += ($line_gross = $line['price'] * $line['units']);
        /* Inline calculation of line taxes and ad result to cumulative variable $taxes. */
        $taxes += ($line_taxes = ceil(($line_gross * ($line['tax'] + $line['duty'])) / 0.05) * 0.05);
        echo sprintf("    %3d %-30s: %5.2f\n", $line['units'], $line['description'], $line_gross + $line_taxes);
    }
    echo sprintf("Sales Taxes: %6.2f\n", $taxes);
    echo sprintf("Total:       %6.2f\n", $gross + $taxes);
    echo "\n";
}
