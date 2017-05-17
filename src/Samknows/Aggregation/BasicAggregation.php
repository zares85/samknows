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
     * BasicAggregation constructor.
     *
     * @param int $unitId
     * @param $hour
     */
    public function __construct($unitId, $hour) {
        $this->unitId = $unitId;
        $this->hour = $hour;
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
}