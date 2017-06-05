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
use TPG\Timewarp\Support\Traits\DateTimeElements;

class PeriodProperty extends Property
{
    use DateTimeElements;

    /**
     * @var \DateTime
     */
    private $start;
    /**
     * @var \DateTime
     */
    private $end;

    /**
     * PeriodProperty constructor.
     * @param \DateTime $start
     * @param \DateInterval|\DateTime $endOrDuration
     */
    public function __construct(\DateTime $start, $endOrDuration)
    {
        $this->start = $start;
        $this->end = $endOrDuration;
        if (get_class($endOrDuration) === \DateInterval::class) {
            $this->end = (new \DateTime($start, $start->getTimezone()))->add($endOrDuration);
        }
    }

    protected function dateTimeString(\DateTime $dateTime)
    {
        return 'P' . $this->dateAsString($dateTime) . 'T' .
            $this->timeAsString($dateTime) .
            $this->utcSuffix($dateTime);
    }

    /**
     * Get property value as string
     * @return string
     */
    public function getValue(): string
    {
        return $this->dateTimeString($this->start) . '/' . $this->dateTimeString($this->end);
    }
}
