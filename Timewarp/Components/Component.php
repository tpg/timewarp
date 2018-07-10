<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace TPG\Timewarp\Components;


use TPG\Timewarp\Calendar;
use TPG\Timewarp\Support\CalendarObject;
use TPG\Timewarp\Support\Traits\IsDelimited;

/**
 * Class Component
 * @package TPG\Timewarp\Components
 */
abstract class Component extends CalendarObject
{
    use IsDelimited;

    /**
     * @var string
     */
    protected $name;

    /**
     * Get the unwrapped content
     *
     * @return string
     * @throws \TPG\Timewarp\Exceptions\MissingRequiredPropertyException
     */
    protected function unwrapped(): string
    {
        $this->validateRequiredProperties();

        $properties = '';
        foreach ($this->properties as $property) {
            $properties .= $property->contentLine();
        }
        return $properties;
    }

    /**
     * Return the component as a string
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->wrap();
    }

    /**
     * Get the associated Calendar object
     *
     * @return Calendar
     */
    public function getCalendar(): Calendar
    {
        $calendar = new Calendar();
        $calendar->addComponent($this);
        return $calendar;
    }
}
