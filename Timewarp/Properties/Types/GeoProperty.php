<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace TPG\Timewarp\Properties\Types;


use TPG\Timewarp\Properties\Property;

class GeoProperty extends Property
{
    /**
     * GeoProperty constructor.
     * @param float $lat
     * @param float $long
     */
    public function __construct(float $lat, float $long)
    {
        $this->value = [
            'lat' => $lat,
            'long' => $long
        ];
    }

    /**
     * Get property value as string
     * @return string
     */
    public function getValue(): string
    {
        return implode(';', $this->value);
    }
}
