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

class OutOfBoundsException extends \Exception
{
    /**
     * OutOfBoundsException constructor.
     * @param Property $property
     * @param mixed $value
     */
    public function __construct(Property $property, $value)
    {
        parent::__construct($this->formatMessage($property, $value));
    }

    protected function formatMessage(Property $property, $value)
    {
        return 'The value of ' . $value . ' is out of bounds for property ' . $property->name();
    }
}
