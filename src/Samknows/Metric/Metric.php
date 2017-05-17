<?php
/**
 * Metric.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

namespace Samknows\Metric;


interface Metric {

    /**
     * @return int
     */
    public function unitId();

    /**
     * @return \DateTime
     */
    public function timestamp();

    /**
     * @return float
     */
    public function value();
}