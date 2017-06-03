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
use THEPUBLICGOOD\Timewarp\Exceptions\OutOfBoundsException;
use THEPUBLICGOOD\Timewarp\Properties\Types\EnumProperty;

class Status extends EnumProperty
{
    protected $name = 'STATUS';
    protected $conformance = [Event::class, Todo::class, Journal::class];

    protected $values = [
        'TENTATIVE',
        'CONFIRMED',
        'CANCELLED',
        'NEEDS-ACTION',
        'COMPLETED',
        'IN-PROCESS',
        'CANCELLED',
        'DRAFT',
        'FINAL',
    ];

    protected function permittedValue(string $value): bool
    {
        return in_array($value, $this->values);
    }

    /**
     * Status constructor.
     * @param string $value
     * @throws OutOfBoundsException
     */
    public function __construct(string $value)
    {
        if (!$this->permittedValue($value)) {
            throw new OutOfBoundsException($this, $value);
        }

        parent::__construct($value);
    }


}
