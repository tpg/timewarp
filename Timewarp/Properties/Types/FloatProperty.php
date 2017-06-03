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

class FloatProperty extends Property
{
    /**
     * FloatProperty constructor.
     * @param float $value
     */
    public function __construct(float $value)
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
