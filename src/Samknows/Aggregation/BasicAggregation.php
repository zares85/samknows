<?php
/**
 * BasicAggregation.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

namespace Samknows\Aggregation;

class BasicAggregation implements Aggregation {

    /**
     * @var int
     */
    protected $unitId;

    /**
     * @var $int
     */
    protected $hour;

    /**
     * @var string
     */
    protected $metric;

    /**
     * BasicAggregation constructor.
     *
     * @param int $unitId
     * @param $hour
     */
    public function __construct($unitId, $hour, $metric) {
        $this->unitId = $unitId;
        $this->hour = $hour;
        $this->metric = $metric;
    }

    /**
     * @return int
     */
    public function unitId() {
        return $this->unitId;
    }

    /**
     * @return int between 0 and 23
     */
    public function hour() {
        return $this->hour;
    }

    /**
     * @return string download, upload, latency or packet_loss
     */
    public function metric() {
        return $this->metric;
    }
}