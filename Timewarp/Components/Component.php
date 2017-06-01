<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace THEPUBLICGOOD\Timewarp\Components;


use THEPUBLICGOOD\Timewarp\Properties\Property;

/**
 * Class Component
 * @package THEPUBLICGOOD\Timewarp\Components
 */
abstract class Component
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var Property[]
     */
    protected $properties;

    protected function startDelimiter(): string
    {
        return 'BEGIN:' . $this->name . "\r\n";
    }

    protected function endDelimiter(): string
    {
        return 'END:' . $this->name . "\r\n";
    }

    /**
     * Add a property
     *
     * @param Property $property
     */
    public function addProperty(Property $property)
    {
        $this->properties[] = $property;
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

    public function wrap(string $content): string
    {
        return $this->startDelimiter() . $content . $this->endDelimiter();
    }

    /**
     * Return the component as a string
     *
     * @return string
     */
    public function toString(): string
    {
        $properties = '';
        foreach ($this->properties as $property) {
            $properties .= $property->contentLine() . "\r\n";
        }
        return $this->wrap($properties);
    }
}
