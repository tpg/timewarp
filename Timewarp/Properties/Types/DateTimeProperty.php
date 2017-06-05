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
use TPG\Timewarp\Support\Traits\DateTimeElements;

class DateTimeProperty extends Property
{
    use DateTimeElements;

    /**
     * DateTimeProperty constructor.
     * @param \DateTime $value
     */
    public function __construct(\DateTime $value)
    {
        $this->value = $value;
    }

    /**
     * Get property value as string
     * @return string
     */
    public function getValue(): string
    {
        return 'P' . $this->dateAsString($this->value) . 'T' .
            $this->timeAsString($this->value) .
            $this->utcSuffix($this->value);
    }
}
