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
     * @param string $propertyString
     * @param string $relatedPropertyString
     */
    public function __construct(string $propertyString, string $relatedPropertyString)
    {
        parent::__construct($this->formatMessage($propertyString, $relatedPropertyString));
    }

    protected function formatMessage(string $propertyString, string $relatedPropertyString)
    {
        return '"Property ' . $propertyString . '" needs an instance of related property "' . $relatedPropertyString . '".';
    }
}
