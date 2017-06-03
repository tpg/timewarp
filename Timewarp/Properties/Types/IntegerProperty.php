<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace THEPUBLICGOOD\Timewarp\Properties\Types;


use THEPUBLICGOOD\Timewarp\Properties\Property;

class IntegerProperty extends Property
{
    /**
     * IntegerProperty constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * Get property value as string
     * @return string
     */
    public function getValue(): string
    {
        return (string)$this->value;
    }
}
