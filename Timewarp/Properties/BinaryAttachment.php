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
use TPG\Timewarp\Properties\Parameters\Encoding;
use TPG\Timewarp\Properties\Parameters\FmtType;
use TPG\Timewarp\Properties\Types\BinaryProperty;

class BinaryAttachment extends BinaryProperty
{
    protected $name = 'ATTACH';

    protected $conformance = [Event::class, Todo::class, Journal::class, Alarm::class];

    /**
     * BinaryAttachment constructor.
     * @param string $value
     * @param string|null $mime
     */
    public function __construct(string $value, string $mime = null)
    {
        if (is_file($value) && !$mime) {
            $mime = mime_content_type($value);
        }
        parent::__construct($value, $mime);
        $this->addParameter(new FmtType($this->getMime()))
            ->addParameter(new Encoding('BASE64'));
    }
}
