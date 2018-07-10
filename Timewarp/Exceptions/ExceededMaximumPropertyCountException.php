<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace TPG\Timewarp\Exceptions;

use TPG\Timewarp\Properties\Property;
use TPG\Timewarp\Support\CalendarObject;

class ExceededMaximumPropertyCountException extends \Exception
{
    /**
     * ExceededMaximumPropertyCountException constructor.
     * @param CalendarObject $calendarObject
     * @param Property $property
     */
    public function __construct(CalendarObject $calendarObject, Property $property)
    {
        parent::__construct($this->formatMessage($calendarObject, $property));
    }

    protected function formatMessage(CalendarObject $calendarObject, Property $property)
    {
        return 'Cannot attach "' . get_class($property) . '" to "' . get_class($calendarObject) .
            '". Maximum property count of ' . $property->conformance()[get_class($calendarObject)] . ' exceeded.';
    }
}
