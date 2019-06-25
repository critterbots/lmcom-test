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

/**
 * Abstract class to be inherited from specialiced File Readers.
 */
class CAbstractFileReader
{
    /** @var string|null $filename File name to be readed. */
    protected $filename = null;

    /**
     * Create the instance.
     * @param string $filename File name to read.
     */
    public function __construct(string $filename)
    {
        if (!$this->fileExists($filename)) {
            throw new EReaderException("File $filename not found or not readable.");
        }

        $this->filename = $filename;
    }

    /**
     * Check if a file exists and is readable.
     * @param string $filename File name to be checked.
     * @return bool Return true if exists and is readable.
     */
    private function fileExists(string $filename): bool
    {
        return file_exists($filename) && is_file($filename) && is_readable($filename);
    }
}
