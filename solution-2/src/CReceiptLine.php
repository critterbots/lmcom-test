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

class CReceiptLine extends CAbstractReceiptObject
{
    /** @var float $quantity Quantity of items. */
    private $quantity = 0;
    /** @var string $description Description. */
    private $description = null;
    /** @var float $unit_price Price of an item. */
    private $unit_price = 0;
    /** @var float $sales_tax Sales Tax quote in the range [0,1]. */
    private $sales_tax = 0;
    /** @var float $duty_tax Duty Tax quote in the range [0,1]. */
    private $duty_tax = 0;

    /**
     * Create the instance and set all values to compute the line.
     * @param float $quantity Quantity of items in the line.
     * @param string $description Description of the line.
     * @param float $unit_price Price for each item in the line.
     * @param float $sales_tax $sales tax in range [0, 1].
     * @param float $duty_tax $duty_tax in range [0, 1].
     */
    public function __construct(float $quantity, string $description, float $unit_price, float $sales_tax, float $duty_tax)
    {
        $this->quantity = $quantity;
        $this->description = $description;
        $this->unit_price = $unit_price;
        $this->sales_tax = $sales_tax;
        $this->duty_tax = $duty_tax;

        /* Compute line gross price. */
        $gross = $quantity * $unit_price;
        $this->addGross($gross);
        /* Compute line taxes. */
        $this->addTaxes(ceil(($gross * ($sales_tax + $duty_tax)) / 0.05) * 0.05);
    }

    /**
     * Get the Quantity attribute.
     * @return float Return current quantity value.
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * Get the Description attribute.
     * @return string|null Return the description value if setted or null otherwise.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
}
