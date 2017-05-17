<?php
/**
 * BasicMetric.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

namespace Samknows\Metric;

class BasicMetric implements Metric {

    /**
     * @var int
     */
    protected $unitId;

    /**
     * @var \DateTime
     */
    protected $timestamp;

    /**
     * @var float
     */
    protected $value;

    /**
     * BasicMetric constructor.
     *
     * @param int $unitId
     * @param \DateTime $timestamp
     * @param float $value
     */
    public function __construct($unitId, \DateTime $timestamp, $value) {
        $this->unitId = $unitId;
        $this->timestamp = $timestamp;
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function unitId() {
        return $this->unitId;
    }

    /**
     * @return \DateTime
     */
    public function timestamp() {
        return $this->timestamp;
    }

    /**
     * @return float
     */
    public function value() {
        return $this->value;
    }
}