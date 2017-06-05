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
use TPG\Timewarp\Properties\Types\EnumProperty;

class Transparency extends EnumProperty
{
    const
        OPAGUE = 'OPAGUE',
        TRANSPARENT = 'TRANSPARENT';

    protected $name = 'TRANSP';

    protected $conformance = [Event::class];

    protected $values = [
        'OPAQUE', 'TRANSPARENT'
    ];
}
