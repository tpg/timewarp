<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) Thepublicgood (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace TPG\Timewarp\Properties\Parameters;


class FmtType extends Parameter
{
    protected $name = 'FMTTYPE';

    /**
     * FmtType constructor.
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
