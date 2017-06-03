<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace TPG\Timewarp\Properties\Parameters;


class Encoding extends Parameter
{
    protected $name = 'ENCODING';

    /**
     * Encoding constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Get the parameter value as a string
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->value;
    }
}
