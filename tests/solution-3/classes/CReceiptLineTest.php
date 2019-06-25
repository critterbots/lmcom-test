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
 * @package solution-3
 */

namespace lmcom\solution3\entities;

use PHPUnit\Framework\TestCase;

/**
 * Test class for { @see CReceiptLine }.
 */
class CReceiptLineTest extends TestCase
{
    /**
     * This method provide a list of sample input data Receipt Line calculus as defined in the requirement.
     * Each item in the array contains quantity, description, unit price, sales tax quote, sales duty quote
     * (both taxes expressed by the range [0, 1], in ex: 10% -> 0.1), gross of line, taxes of line and total amount.
     * @return array Returns an array filled with some test sample data where each register is a sample (case) to test.
     */
    public function dataProviderLines(): array
    {
        /**
         * Structure of data is according to parameters passed to the test method.
         * [quantity, description, price, tax, duty, gross, taxes, total]
         */
        return  [
            [ 1, 'book',                       12.49, 0.00, 0.00, 12.49, 0.00, 12.49 ],
            [ 1, 'music CD',                   14.99, 0.10, 0.00, 14.99, 1.50, 16.49 ],
            [ 1, 'chocolate bar',               0.85, 0.00, 0.00,  0.85, 0.00,  0.85 ],
            [ 1, 'imported box of chocolates', 10.00, 0.00, 0.05, 10.00, 0.50, 10.50 ],
            [ 1, 'imported bottle of perfume', 47.50, 0.10, 0.05, 47.50, 7.15, 54.65 ],
            [ 1, 'imported bottle of perfume', 27.99, 0.10, 0.05, 27.99, 4.20, 32.19 ],
            [ 1, 'bottle of perfume',          18.99, 0.10, 0.00, 18.99, 1.90, 20.89 ],
            [ 1, 'packet of headache pills',    9.75, 0.00, 0.00,  9.75, 0.00,  9.75 ],
            [ 1, 'box of imported chocolates', 11.25, 0.00, 0.05, 11.25, 0.60, 11.85 ]
        ];
    }

    /**
     * Test the constructor of class.
     * @test __construct
     * @dataProvider dataProviderLines
     * @param float $quantity Quantity of items in the line.
     * @param string $description Description of the line.
     * @param float $unit_price Price for each item in the line.
     * @param float $sales_tax $sales tax in range [0, 1].
     * @param float $duty_tax $duty_tax in range [0, 1].
     * @param float $gross Computed gross ($quantity * $unit_price).
     * @param float $taxes Computed taxes applying rounding rules.
     * @param float $total Computed total ($gross + $taxes) of the line.
     */
    public function testConstruct(
        float $quantity, string $description, float $unit_price, float $sales_tax, float $duty_tax,
        float $gross, float $taxes, float $total
    ) {
        /* Create a Receipt Line. */
        $receiptLine = new CReceiptLine($quantity, $description, $unit_price, $sales_tax, $duty_tax);

        /* Assert that input values set in the constructor are well stored.*/
        $this->assertSame($quantity, $receiptLine->getQuantity());
        $this->assertSame($description, $receiptLine->getDescription());

        /* Assert that calculated fields after call the constructor are well. */
        $this->assertSame($gross, $receiptLine->getGross());
        $this->assertSame($taxes, $receiptLine->getTaxes());
        $this->assertSame($total, $receiptLine->getTotal());
    }
}
