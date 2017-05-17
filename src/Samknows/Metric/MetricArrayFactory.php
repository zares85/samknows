<?php
/**
 * MetricArrayFactory.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

namespace Samknows\Metric;

class MetricArrayFactory {

    /**
     * @param int $unitId
     * @param array $data
     * @return array
     */
    public static function make($unitId, array $data) {
        $metrics = [];

        foreach ($data as $metric) {
            $metrics[] = new BasicMetric($unitId, new \DateTime($metric->timestamp), $metric->value);
        }

        return $metrics;
    }
}