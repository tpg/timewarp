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
use TPG\Timewarp\Properties\Start;

class Builder
{
    /**
     * @var Calendar
     */
    private $calendar;

    /**
     * @var Component
     */
    private $component;

    /**
     * Builder constructor.
     * @param Calendar $calendar
     */
    public function __construct(Calendar $calendar)
    {
        $this->calendar = $calendar;
    }

    public function component(Component $component)
    {
        $this->component = $component;
        return $this;
    }

    public function from($year, $month, $day, $hour, $minute = 0, $second = 0)
    {
        $start = new \DateTime();
        $start->setDate($year, $month, $day);
        $start->setTime($hour, $minute, $second);
        return $this;
    }
}
