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


use TPG\Timewarp\Exceptions\ExceededMaximumPropertyCountException;
use TPG\Timewarp\Exceptions\FailedConformanceTestException;
use TPG\Timewarp\Exceptions\MissingRequiredPropertyException;
use TPG\Timewarp\Properties\Property;

abstract class CalendarObject
{
    /**
     * @var string
     */
    protected $name;

    /**
     * Attached properties
     * 
     * @var Property[]
     */
    protected $properties = [];

    /**
     * Required properties
     *
     * @var Property[]
     */
    protected $required = [];

    /**
     * Get the unwrapped content
     *
     * @return string
     */
    abstract protected function unwrapped(): string;

    /**
     * Perform a conformance test on the given property
     *
     * @param Property $property
     *
     * @return void
     * @throws FailedConformanceTestException
     * @throws ExceededMaximumPropertyCountException
     */
    protected function conformanceTest(Property $property)
    {
        if (!in_array(get_class($this), array_keys($property->conformance()))) {
            throw new FailedConformanceTestException($this, $property);
        }

        if (!array_key_exists(get_class($this), $property->conformance())) {
            return;
        }

        $propertyClassName = get_class($property);
        $maxCount = $property->conformance()[get_class($this)];
        $propertyCount = count(array_filter($this->properties, function ($property) use ($propertyClassName) {
            return get_class($property) === $propertyClassName;
        }));

        if ($propertyCount >= $maxCount) {
            throw new ExceededMaximumPropertyCountException($this, $property);
        }
    }

    /**
     * Get attached class names as an array of strings
     *
     * @return array
     */
    protected function getAttachedClassNames(): array
    {
        $names = [];
        foreach ($this->properties as $property) {
            $names[] = get_class($property);
        }

        return $names;
    }

    /**
     * Validate the attached properties against the required properties and
     * return the missing class names
     *
     * @return array
     */
    public function getMissingRequiredProperties(): array
    {
        $attached = $this->getAttachedClassNames();

        $missing = array_filter($this->required, function ($requiredProperty) use ($attached) {
            return !in_array($requiredProperty, $attached);
        });

        return array_values($missing);
    }

    /**
     * Validate required properties
     *
     * @return void
     * @throws MissingRequiredPropertyException
     */
    public function validateRequiredProperties()
    {
        $missing = $this->getMissingRequiredProperties();
        if (count($missing)) {
            throw new MissingRequiredPropertyException($this, $missing[0]);
        }
    }

    /**
     * Add a property
     *
     * @param Property $property
     * @return $this
     * @throws ExceededMaximumPropertyCountException
     * @throws FailedConformanceTestException
     */
    public function addProperty(Property $property)
    {
        $this->conformanceTest($property);

        $this->properties[] = $property;
        return $this;
    }

    /**
     * Get attached properties by class
     *
     * @param string $propertyClass
     * @return array
     */
    public function getProperties(string $propertyClass): array
    {
        return array_values(array_filter($this->properties, function ($property) use ($propertyClass) {
            return get_class($property) === $propertyClass;
        }));
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
