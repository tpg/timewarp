<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace TPG\Timewarp\Properties;


use TPG\Timewarp\Exceptions\OutOfBoundsException;
use TPG\Timewarp\Properties\Types\IntegerProperty;

class Priority extends IntegerProperty
{
    protected $name = 'PRIORITY';

    /**
     * Priority constructor.
     * @param int $value
     * @throws OutOfBoundsException
     */
    public function __construct(int $value)
    {
        if ($value < 1 || $value > 9) {
            throw new OutOfBoundsException($this, $value);
        }
        parent::__construct($value);
    }

    /**
     * Get property value as string
     * @return string
     */
    public function getValue(): string
    {
        return (string)$this->value;
    }
}
