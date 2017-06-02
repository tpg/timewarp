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
        $event->addProperty(new Timewarp\Properties\Description('This is a description that is supposed to be at least seventy-five characters long. This line should be broken up onto two lines.'));
        $calendar = $event->getCalendar();
        $calendar->addProperty(new Timewarp\Properties\ProdId('Product ID'));
        $ics = $calendar->toString();

        dd($ics);
    }
}
