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

namespace lmcom\solution2\entities;

use Iterator;

/**
 * Main class to represent a Receipt instance.
 * This class implements the interace Iterator to have the capability to be iterated over each line in the receipt.
 * @
 */
class CReceipt extends CAbstractReceiptObject implements Iterator
{
    /** @var array $lines Array of lines, each one of type @see { lmcom\solution2\entities\CReceiptLine }. */
    private $lines = array();
    /** @var int $position When iterates the Receipt, this is the current position in $lines array. */
    private $position = 0;

    public function __construct()
    {

    }

    /**
     * Iterator interface method that retry current line when iterates the receipt.
     * @return CReceiptLine|null If $position is valid returns a @see { lmcom\solution2\entities\CReceiptLine }.
     * Otherwise return null.
     */
    public function current(): ?CReceiptLine
    {
        return ($this->valid() ? $this->lines[$this->position] : null);
    }

    /**
     * Iterator interface method to increment in one unit the position. Advance to next iteration.
     */
    public function next(): void
    {
        $this->position++;
    }

    /**
     * Iterator interface method that returns current key value. In this case the position in the array of lines.
     * @return int Return the position.
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * Iterator interface method to test if current position is valid.
     * @return bool Return true if current position is valid.
     */
    public function valid(): bool
    {
        $c = count($this->lines);

        return ($c > 0 && $this->position < $c);
    }

    /**
     * Iterator interface method to rewind the cursor.
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Add a line to the Receipt.
     * @param float $units Quantity of items in the line.
     * @param string $description Description of the line.
     * @param float $unit_price Price for each item in the line.
     * @param float $sales_tax $sales tax in range [0, 1].
     * @param float $duty_tax $duty_tax in range [0, 1].
     * @return CReceiptLine Return a @see { lmcom\solution2\entities\CReceiptLine } instance.
     */
    public function addLine(float $units, string $description, float $unit_price, float $sales_tax, float $duty_tax): CReceiptLine
    {
        $line = new CReceiptLine($units, $description, $unit_price, $sales_tax, $duty_tax);

        $this->addGross($line->getGross());
        $this->addTaxes($line->getTaxes());

        $this->lines[] = $line;

        return $line;
    }
}
