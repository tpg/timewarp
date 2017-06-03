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


use THEPUBLICGOOD\Timewarp\Components\Event;
use THEPUBLICGOOD\Timewarp\Components\Todo;
use THEPUBLICGOOD\Timewarp\Properties\Types\GeoProperty;

class Geo extends GeoProperty
{
    protected $name = 'GEO';

    protected $conformance = [Event::class, Todo::class];
}
