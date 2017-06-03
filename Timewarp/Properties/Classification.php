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
use TPG\Timewarp\Components\Journal;
use TPG\Timewarp\Components\Todo;
use TPG\Timewarp\Properties\Types\TextProperty;

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
