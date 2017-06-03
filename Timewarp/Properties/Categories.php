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


use THEPUBLICGOOD\Timewarp\Components\Event;
use THEPUBLICGOOD\Timewarp\Components\Journal;
use THEPUBLICGOOD\Timewarp\Components\Todo;
use THEPUBLICGOOD\Timewarp\Properties\Types\TextProperty;
use THEPUBLICGOOD\Timewarp\Support\Traits\MultipleValues;

class Categories extends TextProperty
{
    use MultipleValues;

    protected $name = 'CATEGORIES';

    protected $conformance = [Event::class, Todo::class, Journal::class];
}
