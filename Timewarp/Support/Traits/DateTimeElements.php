<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace TPG\Timewarp\Support\Traits;


use Carbon\Carbon;

trait DateTimeElements
{
    protected function dateAsString(\DateTime $dateTime): string
    {
        $date = Carbon::createFromTimestamp($dateTime->getTimestamp());
        return $date->format('Ymd');
    }

    protected function timeAsString(\DateTime $dateTime): string
    {
        $time = Carbon::createFromTimestamp($dateTime->getTimestamp());
        return $time->format('His');
    }

    protected function utcSuffix(\DateTime $dateTime)
    {
        $suffix = null;
        if ($dateTime->getTimezone()->getName() === 'UTC') {
            $suffix = 'Z';
        }
        return $suffix;
    }
}
