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

namespace lmcom\solution3\domains;

use lmcom\solution3\entities\CReceipt;

use lmcom\solution3\infrastructure\exceptions\EReaderException;

use lmcom\solution3\infrastructure\interfaces\IReceiptReader;
use lmcom\solution3\infrastructure\interfaces\IReceiptWriter;

/**
 * Use cases to apply to Receipts.
 */
class CReceiptCase
{
    /**
     * Read the Receipt input from a readable input.
     * @param IReceiptReader $reader Reader instance that points to the input of the receipt.
     * @return CReceipt If success, returns a well formed @see { CReceipt } instance with all lines and computed values.
     * @throws EReaderException If somthing happens, then throws an exception.
     */
    public static function read(IReceiptReader $reader): CReceipt
    {
        $descriptor = $reader->read();

        $receipt = new CReceipt();

        if (is_array($descriptor) && count($descriptor) > 0) {
            foreach ($descriptor as $line) {
                $receipt->addLine(
                    $line['quantity'], $line['description'],
                    $line['price'], $line['sales_tax'], $line['duty_tax']
                );
            }
        }

        return $receipt;
    }

    /**
     * Writes the Receipt to desired output (IReceiptWriter instance):
     * @param IReceiptWriter $writer The Writer instance capable to write the Receipt.
     * @param CReceipt $receipt The Receipt to be written.
     */
    public static function write(IReceiptWriter $writer, CReceipt $receipt): void
    {
        $writer->write($receipt);
    }
}
