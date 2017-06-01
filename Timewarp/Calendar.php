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
     * @var Component[]
     */
    protected $components = [];

    /**
     * Get the unwrapped content
     *
     * @return string
     */
    protected function unwrapped(): string
    {
        {
            $components = '';
            foreach ($this->components as $component) {
                $components .= $component->toString();
            }
            return $components;
        }
    }

    /**
     * Add a component to the calendar object
     *
     * @param Component $component
     */
    public function addComponent(Component $component)
    {
        $this->components[] = $component;
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
