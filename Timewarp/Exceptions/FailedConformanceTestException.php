<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace THEPUBLICGOOD\Timewarp\Exceptions;


use THEPUBLICGOOD\Timewarp\Properties\Property;
use THEPUBLICGOOD\Timewarp\Support\CalendarObject;
use Throwable;

class FailedConformanceTestException extends \Exception
{
    public function __construct(CalendarObject $calendarObject, Property $property)
    {
        parent::__construct($this->formatMessage($calendarObject, $property));
    }

    protected function formatMessage(CalendarObject $calendarObject, Property $property): string
    {
        return 'Failed conformance test. Cannot add ' . $property->name() . ' to ' . $calendarObject->name();
    }
}
