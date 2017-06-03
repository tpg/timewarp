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

/**
 * Class TextProperty
 * @package TPG\Timewarp\Properties\Types
 */
class TextProperty extends Property
{
    /**
     * TextProperty constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * Break a text line into multiple lines
     * @return string
     */
    protected function lineBreaks()
    {
        $words = preg_split('/\s+/', $this->value);
        $lines = [];
        $line = null;
        $lineCount = 0;
        foreach ($words as $index => $word) {
            $line .= $word;
            if ($index >= count($words) -1 || strlen($line) >= 75) {
                $lines[$lineCount] = ($lineCount > 0 ? ' ' : null) . $line;
                $lineCount++;
                $line = null;
            } else {
                $line .= ' ';
            }
        }
        return implode("\r\n", $lines);
    }

    /**
     * Get property value as string
     * @return string
     */
    public function getValue(): string
    {
        return $this->lineBreaks();
    }
}
