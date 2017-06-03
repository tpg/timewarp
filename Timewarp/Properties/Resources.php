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
use TPG\Timewarp\Components\Todo;
use TPG\Timewarp\Properties\Types\TextProperty;
use TPG\Timewarp\Support\Traits\MultipleValues;

class Resources extends TextProperty
{
    use MultipleValues;

    protected $name = 'RESOURCES';

    protected $conformance = [Event::class, Todo::class];
}
