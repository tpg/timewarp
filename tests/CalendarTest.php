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
use TPG\Timewarp;

class CalendarTest extends TestCase
{
    public function testComplete()
    {
        $event = new Timewarp\Components\Event();
        $event->addProperty(new Timewarp\Properties\Start(new \DateTime('2019-01-01 13:30:00')));
        $event->addProperty(new Timewarp\Properties\End(new \DateTime('2019-01-01 22:00:00')));
        $event->addProperty(new Timewarp\Properties\Description('This is a description that is supposed to be at least seventy-five characters long. This line should be broken up onto two lines.'));
        $event->addProperty((new Timewarp\Properties\Categories(['CAT1', 'CAT2', 'CAT3']))->addValue('CAT4'));
        $event->addProperty(new Timewarp\Properties\Classification(Timewarp\Properties\Classification::PRIVATE));
        $event->addProperty(new Timewarp\Properties\Comment('This is a comment that should be broken up into multiple lines. Comments are used to describe the event in more details'));
        $event->addProperty(new Timewarp\Properties\Geo(24.5,13.7));
        $event->addProperty(new Timewarp\Properties\Location('Sandton Convention Centre'));
        $event->addProperty(new Timewarp\Properties\Resources(['desk', 'char']));
        $event->addProperty(new Timewarp\Properties\Status(Timewarp\Properties\Status::TENTATIVE));
        $event->addProperty(new Timewarp\Properties\Transparency(Timewarp\Properties\Transparency::TRANSPARENT));

        $calendar = $event->getCalendar();
        $calendar->addProperty(new Timewarp\Properties\ProductId('Product ID'));
        $ics = $calendar->toString();

        $calendar->save('calendar.ics');
    }
}
