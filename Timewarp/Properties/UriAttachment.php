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


use THEPUBLICGOOD\Timewarp\Components\Alarm;
use THEPUBLICGOOD\Timewarp\Components\Event;
use THEPUBLICGOOD\Timewarp\Components\Journal;
use THEPUBLICGOOD\Timewarp\Components\Todo;
use THEPUBLICGOOD\Timewarp\Properties\Parameters\FmtType;
use THEPUBLICGOOD\Timewarp\Properties\Types\TextProperty;

class UriAttachment extends TextProperty
{
    protected $name = 'ATTACH';

    protected $conformance = [Event::class, Todo::class, Journal::class, Alarm::class];
    /**
     * @var null|string
     */
    private $mime;

    /**
     * UriAttachment constructor.
     * @param string $value
     * @param string|null $mime
     * @internal param string $name
     */
    public function __construct(string $value, string $mime)
    {
        $this->mime = $mime;
        parent::__construct($value);

        $this->addParameter(new FmtType($mime));
    }


}
