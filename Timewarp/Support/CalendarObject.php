<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace THEPUBLICGOOD\Timewarp\Support;


abstract class CalendarObject
{
    /**
     * Get the unwrapped content
     *
     * @return string
     */
    abstract protected function unwrapped(): string;
}
