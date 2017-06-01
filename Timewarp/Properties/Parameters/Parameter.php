<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace THEPUBLICGOOD\Timewarp\Properties\Parameters;


/**
 * Class Parameter
 * @package THEPUBLICGOOD\Timewarp\Properties\Parameters
 */
abstract class Parameter
{
    /**
     * @var mixed
     */
    protected $value;

    /**
     * @var string
     */
    protected $name;

    /**
     * Get the parameter value as a string
     *
     * @return string
     */
    abstract public function toString(): string;

    /**
     * Cast the parameter as a string
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->toString();
    }
}
