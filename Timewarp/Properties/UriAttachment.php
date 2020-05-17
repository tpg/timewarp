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


use TPG\Timewarp\Components\Alarm;
use TPG\Timewarp\Components\Event;
use TPG\Timewarp\Components\Journal;
use TPG\Timewarp\Components\Todo;
use TPG\Timewarp\Properties\Parameters\FmtType;
use TPG\Timewarp\Properties\Types\TextProperty;

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
    public function __construct(string $value, $mime)
    {
        $this->mime = $mime;
        parent::__construct($value);

        if ($mime) {
            $this->addParameter(new FmtType($mime));
        }
    }


}
