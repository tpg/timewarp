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
use THEPUBLICGOOD\Timewarp\Components\FreeBusy;
use THEPUBLICGOOD\Timewarp\Properties\Types\DateTimeProperty;

class DtEnd extends DateTimeProperty
{
    protected $name = 'DTEND';

    protected $conformance = [Event::class, FreeBusy::class];
}
