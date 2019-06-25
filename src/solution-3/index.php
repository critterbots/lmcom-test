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

require_once 'classes/domains/CReceiptCase.php';
require_once 'classes/domains/CTaxCase.php';
require_once 'classes/entities/CAbstractReceiptObject.php';
require_once 'classes/entities/CReceipt.php';
require_once 'classes/entities/CReceiptLine.php';
require_once 'classes/infrastructure/exceptions/EReaderException.php';
require_once 'classes/infrastructure/interfaces/IReceiptReader.php';
require_once 'classes/infrastructure/interfaces/IReceiptWriter.php';
require_once 'classes/infrastructure/CAbstractFileReader.php';
require_once 'classes/infrastructure/CReceiptJSONReader.php';
require_once 'classes/infrastructure/CReceiptTerminalWriter.php';

use lmcom\solution3\domains\CReceiptCase;

use lmcom\solution3\infrastructure\CReceiptJSONReader;
use lmcom\solution3\infrastructure\CReceiptTerminalWriter;

/**
 * @var array $samples List of sample input files.
 */
$sample_basedir = __DIR__ . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR;
$samples = [
    $sample_basedir . 'receipt-1.json',
    $sample_basedir . 'receipt-2.json',
    $sample_basedir . 'receipt-3.json'
];

/* Iterates each sample input */
if (count($samples) > 0) {
    for ($i = 0; $i < count($samples); $i++) {
        echo 'Output ' . ($i + 1) . ":\n";
        $reader = new CReceiptJSONReader($samples[$i]);
        $writer = new CReceiptTerminalWriter();
        CReceiptCase::write($writer, CReceiptCase::read($reader));
    }
}
