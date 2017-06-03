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

class EnumProperty extends Property
{
    /**
     * Enum elements
     *
     * @var array
     */
    protected $values = [];

    /**
     * EnumProperty constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * Get property value as string
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
