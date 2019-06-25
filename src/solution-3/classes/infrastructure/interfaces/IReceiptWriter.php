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

use lmcom\solution3\entities\CReceipt;

use lmcom\solution3\infrastructure\exceptions\EReaderException;

/**
 * Interface to define the contract to Write a Receipt to any target.
 */
interface IReceiptWriter
{
    /**
     * Writes the Receipt.
     * @param CReceipt $receipt Receipt instance to write.
     * @throws EReaderException Throws an exception if source is not readable.
     */
    public function write(CReceipt $receipt): void;
}
