<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace THEPUBLICGOOD\Timewarp\Support\Traits;


use THEPUBLICGOOD\Timewarp\Properties\Property;

/**
 * Trait MultipleValues
 *
 * @package THEPUBLICGOOD\Timewarp\Support\Traits
 */
trait MultipleValues
{
    /**
     * @var array
     */
    protected $value = [];

    public function __construct(array $value)
    {
        $this->value = $value;
    }

    /**
     * Add a new value to the property
     *
     * @param string $value
     * @return Property
     */
    public function addValue(string $value)
    {
        $this->value[] = $value;
        return $this;
    }

    /**
     * Get the array of values
     *
     * @return array
     */
    public function valuesArray()
    {
        return $this->value;
    }

    /**
     * Get the value as a string
     *
     * @return string
     */
    public function getValue(): string
    {
        return implode(',', $this->value);
    }
}
