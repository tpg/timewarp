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


use THEPUBLICGOOD\Timewarp\Calendar;
use THEPUBLICGOOD\Timewarp\Properties\Types\TextProperty;

class Method extends TextProperty
{
    protected $name = 'METHOD';

    protected $conformance = [Calendar::class];
}
