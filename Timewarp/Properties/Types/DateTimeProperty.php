<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace THEPUBLICGOOD\Timewarp\Properties\Types;


use Carbon\Carbon;
use THEPUBLICGOOD\Timewarp\Properties\Property;

class DateTimeProperty extends Property
{
    /**
     * DateTimeProperty constructor.
     * @param \DateTime $value
     */
    public function __construct(\DateTime $value)
    {
        $this->value = $value;
    }

    protected function dateAsString(): string
    {
        $date = Carbon::createFromTimestamp($this->value->getTimestamp());
        return $date->format('Ymd');
    }

    protected function timeAsString(): string
    {
        $time = Carbon::createFromTimestamp($this->value->getTimestamp());
        return $time->format('His');
    }

    protected function utcSuffix(): string
    {
        $suffix = null;
        if ($this->value->getTimezone()->getName() === 'UTC') {
            $suffix = 'Z';
        }
        return $suffix;
    }

    /**
     * Get property value as string
     * @return string
     */
    public function getValue(): string
    {
        return 'P' . $this->dateAsString() . 'T' . $this->timeAsString() . $this->utcSuffix();
    }
}
