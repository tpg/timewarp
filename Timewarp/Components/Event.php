<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace TPG\Timewarp\Components;


use TPG\Timewarp\Properties\End;
use TPG\Timewarp\Properties\Stamp;
use TPG\Timewarp\Properties\Start;
use TPG\Timewarp\Properties\Summary;

class Event extends Component
{
    protected $name = 'VEVENT';

    protected $required = [
        Start::class,
        End::class,
        Stamp::class,
        Summary::class,
    ];
}
