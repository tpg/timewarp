<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace THEPUBLICGOOD\Timewarp;


use THEPUBLICGOOD\Timewarp\Components\Component;
use THEPUBLICGOOD\Timewarp\Properties\Property;
use THEPUBLICGOOD\Timewarp\Properties\Version;
use THEPUBLICGOOD\Timewarp\Support\CalendarObject;
use THEPUBLICGOOD\Timewarp\Support\Traits\IsDelimited;

/**
 * Class Calendar
 * @package THEPUBLICGOOD\Timewarp
 */
class Calendar extends CalendarObject
{
    use IsDelimited;

    /**
     * @var string
     */
    protected $name = 'VCALENDAR';

    /**
     * @var Property[]
     */
    protected $properties = [];

    /**
     * @var Component[]
     */
    protected $components = [];

    /**
     * Calendar constructor.
     */
    public function __construct()
    {
        $this->addProperty(new Version('2.0'));
    }

    /**
     * Get the unwrapped content
     *
     * @return string
     */
    protected function unwrapped(): string
    {
        $properties = '';
        foreach ($this->properties as $property) {
            $properties .= $property->contentLine();
        }
        $components = '';
        foreach ($this->components as $component) {
            $components .= $component->toString();
        }
        return $properties . $components;
    }

    /**
     * Add a component to the calendar object
     *
     * @param Component $component
     * @return Calendar
     */
    public function addComponent(Component $component): Calendar
    {
        $this->components[] = $component;
        return $this;
    }

    /**
     * Get an array of components
     * @return array
     */
    public function components(): array
    {
        return $this->components;
    }

    /**
     * Get the calendar object as a string
     *
     * @return string
     */
    public function toString()
    {
        return $this->wrap();
    }

    /**
     *
     *
     * @param $filename
     */
    public function save($filename)
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (strlen($ext) !== 'ics') {
            $filename .= '.ics';
        }
        file_put_contents($filename, $this->toString());
    }
}
