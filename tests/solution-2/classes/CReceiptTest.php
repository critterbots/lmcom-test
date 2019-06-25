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

namespace lmcom\solution3\entities;

use PHPUnit\Framework\TestCase;

/**
 * Test class for { @see CReceiptLine }.
 */
class CReceiptTest extends TestCase
{
    /**
     * This method provide a list of sample input data Receipt Line calculus as defined in the requirement.
     * Each item in the array contains quantity, description, unit price, sales tax quote, sales duty quote
     * (both taxes expressed by the range [0, 1], in ex: 10% -> 0.1), gross of line, taxes of line and total amount.
     * @return array Returns an array filled with some test sample data where each register is a sample (case) to test.
     */
    public function dataProviderReceipts(): array
    {
        /**
         * Structure of data is according to parameters passed to the test method.
         * [lines, gross, taxes, total]
         */
        return  [
            [
                [
                    [ 1.0, 'book',          12.49, 0.00, 0.00, 12.49, 0.00, 12.49 ],
                    [ 1.0, 'music CD',      14.99, 0.10, 0.00, 14.99, 1.50, 16.49 ],
                    [ 1.0, 'chocolate bar',  0.85, 0.00, 0.00,  0.85, 0.00,  0.85 ]
                ],
                28.33, 1.50, 29.83
            ],
            [
                [
                    [ 1.0, 'imported box of chocolates',10.00, 0.00, 0.05, 10.00, 0.50, 10.50 ],
                    [ 1.0, 'imported bottle of perfume',47.50, 0.10, 0.05, 47.50, 7.15, 54.65 ]
                ],
                57.50, 7.65, 65.15
            ],
            [
                [
                    [ 1.0, 'imported bottle of perfume', 27.99, 0.10, 0.05, 27.99, 4.20, 32.19 ],
                    [ 1.0, 'bottle of perfume',          18.99, 0.10, 0.00, 18.99, 1.90, 20.89 ],
                    [ 1.0, 'packet of headache pills',    9.75, 0.00, 0.00,  9.75, 0.00,  9.75 ],
                    [ 1.0, 'box of imported chocolates', 11.25, 0.00, 0.05, 11.25, 0.60, 11.85 ]
                ],
                67.98, 6.70, 74.68
            ]
        ];
    }

    /**
     * Test the addLine method of class.
     * @test addLine
     * @test getGross
     * @test getTaxes
     * @test getTotal
     * @dataProvider dataProviderReceipts
     * @param array $lines Collection of lines in the Receipt.
     * @param float $gross Computed gross ($quantity * $unit_price).
     * @param float $taxes Computed taxes applying rounding rules.
     * @param float $total Computed total ($gross + $taxes) of the line.
     */
    public function testAddLine(array $lines, float $gross, float $taxes, float $total): void
    {
        /* Create a Receipt. */
        $receipt = new CReceipt();

        /* Assert that initial accumulators are set to 0. */
        $this->assertSame(0.0, $receipt->getGross());
        $this->assertSame(0.0, $receipt->getTaxes());
        $this->assertSame(0.0, $receipt->getTotal());

        /* Assert that count works well. */
        $this->assertSame(0, count($receipt));

        /* Add lines to the Receipt. */
        foreach ($lines as $line) {
            $receiptLine = $receipt->addLine($line[0], $line[1], $line[2], $line[3], $line[4]);
            /* Assert that input values are well stored.*/
            $this->assertSame($line[0], $receiptLine->getQuantity());
            $this->assertSame($line[1], $receiptLine->getDescription());

            /* Assert that calculated fields after call are well. */
            $this->assertSame($line[5], $receiptLine->getGross());
            $this->assertSame($line[6], $receiptLine->getTaxes());
            $this->assertSame($line[7], $receiptLine->getTotal());
        }

        /* Assert that count matches with count($lines). */
        $this->assertSame(count($lines), count($receipt));

        /* Assert that computed fields after fill the Receipt are well computed. */
        $this->assertSame($gross, $receipt->getGross());
        $this->assertSame($taxes, $receipt->getTaxes());
        $this->assertSame($total, $receipt->getTotal());
    }
}
