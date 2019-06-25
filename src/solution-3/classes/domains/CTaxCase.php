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

/**
 * Use cases to apply to Taxes.
 */
class CTaxCase
{
    /**
     * This static method represent the case of compute the taxes of a gross amount.
     * @param float $gross $sales tax in range [0, 1].
     * @param float $sales_tax Sales tax in range [0, 1].
     * @param float $duty_tax Duty_tax in range [0, 1].
     * @return float Returns the computed taxes applying the calculus rule.
     */
    public static function computeTaxes(float $gross, float $sales_tax, float $duty_tax): float
    {
        return ceil(($gross * ($sales_tax + $duty_tax)) / 0.05) * 0.05;
    }
}
