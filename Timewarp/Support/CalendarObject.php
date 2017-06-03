<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace TPG\Timewarp\Support;


use TPG\Timewarp\Exceptions\FailedConformanceTestException;
use TPG\Timewarp\Properties\Property;

abstract class CalendarObject
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var Property[]
     */
    protected $properties = [];

    /**
     * Get the unwrapped content
     *
     * @return string
     */
    abstract protected function unwrapped(): string;

    protected function conformanceTest(Property $property): bool
    {
        return in_array(get_class($this), $property->conformance());
    }


    /**
     * Add a property
     *
     * @param Property $property
     * @return $this
     * @throws FailedConformanceTestException
     */
    public function addProperty(Property $property)
    {
        if (!$this->conformanceTest($property)) {
            throw new FailedConformanceTestException($this, $property);
        }
        $this->properties[] = $property;
        return $this;
    }

    /**
     * Get the array of properties
     *
     * @return Property[]
     */
    public function properties()
    {
        return $this->properties;
    }

    /**
     * Get the name of the calendar object
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }
}
