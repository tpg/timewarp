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

class MissingRelatedPropertyException extends \Exception
{
    /**
     * MissingRelatedPropertyException constructor.
     * @param string $property
     * @param string $relatedProperty
     */
    public function __construct(string $property, string $relatedProperty)
    {
        parent::__construct($this->formatMessage($property, $relatedProperty));
    }

    protected function formatMessage(string $property, string $relatedProperty)
    {
        return '"Property ' . $property . '" needs an instance of related property "' . $relatedProperty . '".';
    }
}
