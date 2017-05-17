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

    public function unitId();

    public function timestamp();

    public function value();
}