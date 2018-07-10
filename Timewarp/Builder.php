<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace TPG\Timewarp;

use TPG\Timewarp\Components\Component;

abstract class Builder
{
    /**
     * @var Calendar
     */
    protected $calendar;

    /**
     * @var Component
     */
    protected $component;

    /**
     * Get the associated component
     *
     * @param Component $component
     * @return $this
     */
    public function component(Component $component)
    {
        $this->component = $component;
        return $this;
    }

    /**
     * Create and associate the component with a calendar
     *
     * @return Calendar
     */
    public function createCalendar(): Calendar
    {
        $calendar = new Calendar();
        $calendar->addComponent($this->component);
        return $calendar;
    }
}
