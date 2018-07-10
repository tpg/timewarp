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

class ComponentTest extends TestCase
{
    /**
     * @test
     */
    public function test_components_can_have_properties()
    {
        $event = new Timewarp\Components\Event();
        $event->addProperty(new Timewarp\Properties\Summary('Summary'));

        $this->assertCount(1, $event->properties());
    }

    /**
     * @test
     */
    public function test_throws_exception_when_attaching_wrong_property()
    {
        $this->expectException(Timewarp\Exceptions\FailedConformanceTestException::class);
        $event = new Timewarp\Components\Event();
        $event->addProperty(new Timewarp\Properties\Version('3'));
    }

    /**
     * @test
     */
    public function test_throws_exception_when_property_count_exceed_maximum()
    {
        $this->expectException(Timewarp\Exceptions\ExceededMaximumPropertyCountException::class);
        $event = new Timewarp\Components\Event();
        $event->addProperty(new Timewarp\Properties\Summary('Summary'));
        $event->addProperty(new Timewarp\Properties\Summary('Summary'));
    }

    /**
     * @test
     */
    public function test_throws_exception_when_missing_required_properties()
    {
        $this->expectException(Timewarp\Exceptions\MissingRequiredPropertyException::class);
        $event = new Timewarp\Components\Event();
        $event->addProperty(new Timewarp\Properties\Summary('Summary'));
        $event->toString();
    }

    /**
     * @test
     */
    public function test_can_get_a_single_property_line()
    {
        $summary = new Timewarp\Properties\Summary('Summary');
        $expected = 'SUMMARY:Summary' . "\r\n";
        $this->assertEquals($expected, $summary->contentLine());
        $this->assertEquals($expected, (string)$summary);
    }

    /**
     * @test
     */
    public function test_properties_can_have_parameters()
    {
        $start = new Timewarp\Properties\Start(new \DateTime('now'));
        $start->addParameter(new Timewarp\Properties\Parameters\TzId('Africa/Johannesburg'));
        $this->assertCount(1, $start->parameters());
        $this->assertContains('Africa/Johannesburg', $start->contentLine());
    }

    /**
     * @test
     */
    public function test_component_can_be_represented_as_string()
    {
        $event = new Timewarp\Components\Event();
        $event->addProperty(new Timewarp\Properties\Summary('Summary'))
            ->addProperty(new Timewarp\Properties\Start(new \DateTime('now')))
            ->addProperty(new Timewarp\Properties\End(new \DateTime('now')))
            ->addProperty(new Timewarp\Properties\Stamp(new \DateTime('now')));

        $eventString = $event->toString();

        $this->assertContains('DTSTART', $eventString);
        $this->assertContains('DTEND', $eventString);
        $this->assertContains('DTSTAMP', $eventString);
        $this->assertContains('SUMMARY', $eventString);
    }

    /**
     * @test
     */
    public function test_can_get_a_new_calendar_from_component()
    {
        $event = new Timewarp\Components\Event();
        $event->addProperty(new Timewarp\Properties\Summary('Summary'))
            ->addProperty(new Timewarp\Properties\Start(new \DateTime('now')))
            ->addProperty(new Timewarp\Properties\End(new \DateTime('now')))
            ->addProperty(new Timewarp\Properties\Stamp(new \DateTime('now')));

        $calendar = $event->getCalendar();
        $this->assertInstanceOf(Timewarp\Calendar::class, $calendar);
    }
}
