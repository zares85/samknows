<?php
/**
 * BasicResult.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

namespace Samknows\Result;

use Samknows\Aggregation\Aggregation;

class BasicResult implements Result {

    /**
     * @var Aggregation
     */
    protected $aggregation;

    /**
     * @var float
     */
    protected $mean;

    /**
     * @var float
     */
    protected $minimum;

    /**
     * @var float
     */
    protected $maximum;

    /**
     * @var float
     */
    protected $median;

    /**
     * @var float
     */
    protected $count;

    /**
     * BasicResult constructor.
     *
     * @param Aggregation $aggregation
     * @param float $mean
     * @param float $minimum
     * @param float $maximum
     * @param float $median
     * @param int $count
     */
    public function __construct(Aggregation $aggregation, $mean, $minimum, $maximum, $median, $count) {
        $this->aggregation = $aggregation;
        $this->mean = $mean;
        $this->minimum = $minimum;
        $this->maximum = $maximum;
        $this->median = $median;
        $this->count = $count;
    }

    /**
     * @return Aggregation
     */
    public function aggregation() {
        return $this->aggregation;
    }

    /**
     * @return float
     */
    public function mean() {
        return $this->mean;
    }

    /**
     * @return float
     */
    public function minimum() {
        return $this->minimum;
    }

    /**
     * @return float
     */
    public function maximum() {
        return $this->maximum;
    }

    /**
     * @return float
     */
    public function median() {
        return $this->median;
    }

    /**
     * @return int
     */
    public function count() {
        return $this->count;
    }
}