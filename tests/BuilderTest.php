<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

class BuilderTest extends \Tests\TestCase
{
    /**
     * @test
     */
    public function test_builder()
    {
        $builder = \TPG\Timewarp\Calendar::event('Summary')->from(new DateTime('now'))->forHours(3);
        $calendar = $builder->createCalendar();
        dump($calendar->toString());
    }
}
