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


use TPG\Timewarp\Calendar;
use TPG\Timewarp\Properties\Types\TextProperty;

class ProductId extends TextProperty
{
    protected $name = 'PRODID';

    protected $conformance = [Calendar::class];
}
