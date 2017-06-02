<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace THEPUBLICGOOD\Timewarp\Properties;


use THEPUBLICGOOD\Timewarp\Properties\Parameters\Parameter;

/**
 * Class Property
 * @package THEPUBLICGOOD\Timewarp\Properties
 */
abstract class Property
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @var Parameter[]
     */
    protected $parameters = [];

    /**
     * Add a parameter
     *
     * @param Parameter $parameter
     * @return Property
     */
    public function addParameter(Parameter $parameter): Property
    {
        $this->parameters[] = $parameter;
        return $this;
    }

    /**
     * Get the property parameters
     *
     * @return array
     */
    public function parameters(): array
    {
        return $this->parameters;
    }

    /**
     * Get the parameters as a string
     *
     * @return string|null
     */
    public function parameterString()
    {
        if (count($this->parameters) === 0) {
            return null;
        }
        return implode(';', $this->parameters);
    }

    public function contentLine(): string
    {
        $line = $this->name;
        if ($parameters = $this->parameterString()) {
            $line .= ';' . $parameters;
        }
        return $line . ':' . $this->toString() . "\r\n";
    }

    /**
     * Get property value as string
     * @return string
     */
    abstract public function toString(): string;

    /**
     * Properties can be cast to string
     * @return string
     */
    public function __toString(): string
    {
        return $this->contentLine();
    }
}
