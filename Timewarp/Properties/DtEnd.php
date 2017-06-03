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


use TPG\Timewarp\Components\Event;
use TPG\Timewarp\Components\FreeBusy;
use TPG\Timewarp\Properties\Types\DateTimeProperty;

class DtEnd extends DateTimeProperty
{
    protected $name = 'DTEND';

    protected $conformance = [Event::class, FreeBusy::class];
}
