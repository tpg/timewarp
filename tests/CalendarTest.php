<?php

/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace Tests;

use Carbon\Carbon;
use THEPUBLICGOOD\Timewarp;

class CalendarTest extends TestCase
{
    public function testComplete()
    {
        $event = new Timewarp\Components\Event();
        $event->addProperty(new Timewarp\Properties\DtStart(Carbon::create(2017, 10, 22)));

        dd($event->toString());
    }
}
