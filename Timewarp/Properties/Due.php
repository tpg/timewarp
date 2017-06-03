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


use TPG\Timewarp\Components\Todo;
use TPG\Timewarp\Properties\Types\DateTimeProperty;

class Due extends DateTimeProperty
{
    protected $name = 'DUE';

    protected $conformance = [Todo::class];
}
