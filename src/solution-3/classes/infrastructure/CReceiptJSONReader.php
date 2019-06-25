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

namespace lmcom\solution3\infrastructure;

use lmcom\solution3\infrastructure\exceptions\EReaderException;

use lmcom\solution3\infrastructure\interfaces\IReceiptReader;

/**
 * Specialized class to read a Receipt from a file in JSON.
 */
class CReceiptJSONReader extends CAbstractFileReader implements IReceiptReader
{
    public function read(): array
    {
        $json = json_decode(file_get_contents($this->filename), JSON_OBJECT_AS_ARRAY);

        if ($json === null) {
            throw new EReaderException("File $this->filename syntax error.");
        }

        return $json;
    }
}
