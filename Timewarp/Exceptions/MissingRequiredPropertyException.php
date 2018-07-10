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
use Throwable;

class MissingRequiredPropertyException extends \Exception
{
    public function __construct(CalendarObject $calendarObject, string $propertyClass)
    {
        parent::__construct($this->formatMessage($calendarObject, $propertyClass));
    }

    protected function formatMessage(CalendarObject $calendarObject, string $propertyClass): string
    {
        return 'Missing required "' . $propertyClass . '" property on object "' . get_class($calendarObject) . '". Use the `addProperty()` method to add it.';
    }
}
