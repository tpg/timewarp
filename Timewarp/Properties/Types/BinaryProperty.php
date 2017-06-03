<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace TPG\Timewarp\Properties\Types;


use TPG\Timewarp\Properties\Property;

class BinaryProperty extends Property
{
    /**
     * @var string
     */
    protected $mime;

    /**
     * BinaryProperty constructor.
     * @param string $value
     * @param string|null $mime
     */
    public function __construct(string $value, string $mime = null)
    {
        $this->mime = $mime;
        if (!$mime) {
            $this->mime = mime_content_type($value);
        }
        $content = $value;
        if (is_file($value)) {
            $content = file_get_contents($value);
        }
        $this->value = base64_encode($content);
    }

    /**
     * Get property value as string
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    public function getDecodedValue(): string
    {
        return base64_decode($this->value);
    }

    /**
     * Get the content mime type
     *
     * @return string
     */
    public function getMime(): string
    {
        return $this->mime;
    }

    public function save($filename)
    {
        $value = base64_decode($this->getValue());
        return file_put_contents($filename, $value);
    }
}
