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

namespace lmcom\solution2\entities;

use PHPUnit\Framework\TestCase;

use lmcom\solution3\domains\CReceiptCase;

use lmcom\solution3\infrastructure\CReceiptJSONReader;

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
        $basedir = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR;
        /**
         * Structure of data is according to parameters passed to the test method.
         * [lines, gross, taxes, total]
         */
        return  [
            [ $basedir . 'receipt-1.json', 3, 28.33, 1.50, 29.83 ],
            [ $basedir . 'receipt-2.json', 2, 57.50, 7.65, 65.15 ],
            [ $basedir . 'receipt-3.json', 4, 67.98, 6.70, 74.68 ]
        ];
    }

    /**
     * Test the addLine method of class.
     * @test addLine
     * @test getGross
     * @test getTaxes
     * @test getTotal
     * @dataProvider dataProviderReceipts
     * @param string $filename File name containing input lines in the Receipt.
     * @param int $count_lines Number of items in the input file.
     * @param float $gross Computed gross ($quantity * $unit_price).
     * @param float $taxes Computed taxes applying rounding rules.
     * @param float $total Computed total ($gross + $taxes) of the line.
     */
    public function testAddLine(string $filename, int $count_lines, float $gross, float $taxes, float $total): void
    {
        /* Create Reader. */
        $reader = new CReceiptJSONReader($filename);

        /* Read Receipt. */
        $receipt = CReceiptCase::read($reader);

        /* Assert that count matches with count($lines). */
        $this->assertSame($count_lines, count($receipt));

        /* Assert that computed fields after fill the Receipt are well computed. */
        $this->assertSame($gross, $receipt->getGross());
        $this->assertSame($taxes, $receipt->getTaxes());
        $this->assertSame($total, $receipt->getTotal());
    }
}
