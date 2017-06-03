<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace TPG\Timewarp\Properties\Types;


use TPG\Timewarp\Properties\Property;

class DurationProperty extends Property
{
    /**
     * DurationProperty constructor.
     * @param int $weeks
     * @param int $days
     * @param int $hours
     * @param int $minutes
     * @param int $seconds
     */
    public function __construct(int $weeks = 0, int $days = 0, int $hours = 0, int $minutes = 0, int $seconds = 0)
    {
        $date = $this->dateDuration($weeks, $days);
        $time = $this->timeDuration($hours, $minutes, $seconds);
        $value = 'P';
        if ($date) {
            $value .= $date;
        }
        if ($time) {
            $value .= 'T' . $time;
        }
        $this->value = $value;
    }

    protected function dateDuration(int $weeks = 0, int $days = 0)
    {
        $duration = null;
        if ($weeks) {
            $duration .= $weeks . 'W';
        }
        if ($days) {
            $duration .= $days . 'D';
        }
        return $duration;
    }

    protected function timeDuration(int $hours = 0, $minutes = 0, $seconds = 0)
    {
        $duration = null;
        if ($hours) {
            $duration .= $hours . 'H';
        }
        if ($minutes) {
            $duration .= $minutes . 'M';
        }
        if ($seconds) {
            $duration .= $seconds . 'S';
        }
        return $duration;
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
