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


/**
 * Class Parameter
 * @package TPG\Timewarp\Properties\Parameters
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
     * Get the parameter
     *
     * @return string
     */
    public function getParameter()
    {
        return $this->name . '=' . $this->toString();
    }

    /**
     * Cast the parameter as a string
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->getParameter();
    }
}
