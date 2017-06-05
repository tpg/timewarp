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


use TPG\Timewarp\Components\FreeBusy as FreeBusyComponent;
use TPG\Timewarp\Properties\Types\PeriodProperty;

class FreeBusy extends PeriodProperty
{
    protected $name = 'FREEBUSY';

    protected $conformance = [FreeBusyComponent::class];
}
