<?php
/**
 * Timewarp
 *
 * @author    Warrick Bayman <me@warrickbayman.co.za>
 * @copyright Copyright (c) THEPUBLICGOOD (Pty) Ltd.
 * @license   MIT License http://opensource.org/licenses/MIT
 *
 */

namespace TPG\Timewarp\Builders;

use Carbon\Carbon;
use TPG\Timewarp\Builder;
use TPG\Timewarp\Calendar;
use TPG\Timewarp\Components\Event;
use TPG\Timewarp\Exceptions\MissingRelatedPropertyException;
use TPG\Timewarp\Properties\End;
use TPG\Timewarp\Properties\Stamp;
use TPG\Timewarp\Properties\Start;
use TPG\Timewarp\Properties\Summary;

/**
 * Class EventBuilder
 * @package TPG\Timewarp\Builders
 */
class EventBuilder extends Builder
{
    /**
     * EventBuilder constructor.
     *
     * @param string $summary
     * @throws \TPG\Timewarp\Exceptions\ExceededMaximumPropertyCountException
     * @throws \TPG\Timewarp\Exceptions\FailedConformanceTestException
     */
    public function __construct(string $summary)
    {
        $this->component(new Event());
        $this->component
            ->addProperty(new Summary($summary))
            ->addProperty(new Stamp(Carbon::now()));
    }

    /**
     * Get the Start property object if one has been set
     *
     * @return Start
     * @throws MissingRelatedPropertyException
     */
    protected function getValidatedStartProperty(): Start
    {
        $start = array_values($this->component->getProperties(Start::class));
        if (!$start) {
            throw new MissingRelatedPropertyException(End::class, Start::class);
        }
        return $start[0];
    }

    /**
     * Set a starting date
     *
     * @param \DateTime $from
     *
     * @return EventBuilder
     * @throws \TPG\Timewarp\Exceptions\ExceededMaximumPropertyCountException
     * @throws \TPG\Timewarp\Exceptions\FailedConformanceTestException
     */
    public function from(\DateTime $from): EventBuilder
    {
        $this->component->addProperty(new Start($from));
        return $this;
    }

    /**
     * Set an ending date
     *
     * @param \DateTime $until
     *
     * @return EventBuilder
     * @throws MissingRelatedPropertyException
     * @throws \TPG\Timewarp\Exceptions\ExceededMaximumPropertyCountException
     * @throws \TPG\Timewarp\Exceptions\FailedConformanceTestException
     */
    public function until(\DateTime $until): EventBuilder
    {
        $this->getValidatedStartProperty();
        $this->component->addProperty(new End($until));
        return $this;
    }

    public function forMinutes(int $minutes): EventBuilder
    {
        $start = $this->getValidatedStartProperty();
        $end = new End($start->getDateTimeObject()->add(new \DateInterval('PT' . $minutes . 'M')));
        $this->component->addProperty($end);
        return $this;
    }

    /**
     * Set an ending to the specified hours from the start date
     *
     * @param int $hours
     *
     * @return EventBuilder
     * @throws MissingRelatedPropertyException
     * @throws \TPG\Timewarp\Exceptions\ExceededMaximumPropertyCountException
     * @throws \TPG\Timewarp\Exceptions\FailedConformanceTestException
     */
    public function forHours(int $hours): EventBuilder
    {
        $start = $this->getValidatedStartProperty();
        $end = new End($start->getDateTimeObject()->add(new \DateInterval('PT' . $hours . 'H')));
        $this->component->addProperty($end);
        return $this;
    }

    /**
     * Set the ending to the specified number of days from the start date
     *
     * @param int $days
     *
     * @return EventBuilder
     * @throws MissingRelatedPropertyException
     * @throws \TPG\Timewarp\Exceptions\ExceededMaximumPropertyCountException
     * @throws \TPG\Timewarp\Exceptions\FailedConformanceTestException
     */
    public function forDays(int $days): EventBuilder
    {
        $start = $this->getValidatedStartProperty();
        $end = new End($start->getDateTimeObject()->add(new \DateInterval('P' . $days . 'D')));
        $this->component->addProperty($end);
        return $this;
    }
}
