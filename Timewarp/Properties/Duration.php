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


use TPG\Timewarp\Components\Alarm;
use TPG\Timewarp\Components\Event;
use TPG\Timewarp\Components\Todo;
use TPG\Timewarp\Properties\Types\DurationProperty;

class Duration extends DurationProperty
{
    protected $name = 'DURATION';
    protected $conformance = [Event::class, Todo::class, Alarm::class];
}
