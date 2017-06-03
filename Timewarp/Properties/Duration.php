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


use THEPUBLICGOOD\Timewarp\Components\Alarm;
use THEPUBLICGOOD\Timewarp\Components\Event;
use THEPUBLICGOOD\Timewarp\Components\Todo;
use THEPUBLICGOOD\Timewarp\Properties\Types\DurationProperty;

class Duration extends DurationProperty
{
    protected $name = 'DURATION';
    protected $conformance = [Event::class, Todo::class, Alarm::class];
}
