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

/**
 * Abstract base class for Receipt object. This class covers minimal requirements to have a gross and taxes properties,
 * and a method to get the total amount (gross + taxes).
 */
class CAbstractReceiptObject
{
    /** @var float $gross Cumulative Gross amount of all lines. */
    private $gross = 0;
    /** @var float $taxes Cumulative Taxes amount of all lines. */
    private $taxes = 0;

    /**
     * Add a gross value.
     * @param float $gross Gross amount to add.
     * @return float Return new computed gross amount.
     */
    public function addGross(float $gross): float
    {
        $this->gross += $gross;

        return $this->gross;
    }

    /**
     * Return computed cumulative gross of all lines.
     * @return float Return current value.
     */
    public function getGross(): float
    {
        return $this->gross;
    }

    /**
     * Add a tax value.
     * @param float $taxes Tax amount to add.
     * @return float Return new computed tax amount.
     */
    public function addTaxes(float $taxes): float
    {
        $this->taxes += $taxes;

        return $this->taxes;
    }

    /**
     * Return computed cumulative taxes of all lines.
     * @return float Return current value.
     */
    public function getTaxes(): float
    {
        return $this->taxes;
    }

    /**
     * Return total amount (compound of gross and taxes).
     * @return float Return current value.
     */
    public function getTotal(): float
    {
        return $this->gross + $this->taxes;
    }
}
