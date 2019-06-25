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

namespace lmcom\solution3\infrastructure\interfaces;

use lmcom\solution3\infrastructure\exceptions\EReaderException;

/**
 * Interface to define the contract to Read a Receipt from any source.
 */
interface IReceiptReader
{
    /**
     * Reads the Receipt from an URI.
     * @return array|null Returns a list of lines for the Receipt if source is readable. Each register in the array
     * contains an associative array with quantity, description, price, sales_tax and duty_tax fields.
     * @throws EReaderException Throws an exception if source is not readable.
     */
    public function read(): ?array;
}
