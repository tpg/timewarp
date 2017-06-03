<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace THEPUBLICGOOD\Timewarp\Exceptions;


use Throwable;

class IncompatiblePropertyValueException extends \Exception
{
    public function __construct(string $property, string $expected, string $found)
    {
        parent::__construct($this->formatMessage($property, $expected, $found));
    }

    protected function formatMessage(string $property, string $expected, string $found)
    {
        return 'Incompatible property value on ' . $property . '. Expected ' . $expected . ' but found ' . $found;
    }
}
