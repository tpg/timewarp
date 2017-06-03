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

class Classification extends TextProperty
{
    const PUBLIC = 'PUBLIC';
    const PRIVATE = 'PRIVATE';
    const CONFIDENTIAL = 'CONFIDENTIAL';

    protected $name = 'CLASS';

    protected $conformance = [Event::class, Todo::class, Journal::class];

    /**
     * Classification constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        parent::__construct($value);
    }
}
