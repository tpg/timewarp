<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace TPG\Timewarp\Support\Traits;


trait IsDelimited
{
    /**
     * Get the starting delimiter
     *
     * @return string
     */
    protected function startDelimiter(): string
    {
        return 'BEGIN:' . $this->name . "\r\n";
    }

    /**
     * Get the ending delimiter
     *
     * @return string
     */
    protected function endDelimiter(): string
    {
        return 'END:' . $this->name . "\r\n";
    }

    /**
     * Wrap the content in the delimiters
     *
     * @return string
     */
    public function wrap(): string
    {
        $content = $this->unwrapped();
        return $this->startDelimiter() . $content . $this->endDelimiter();
    }
}
