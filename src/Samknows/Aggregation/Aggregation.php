<?php
/**
 * Aggregation.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

namespace Samknows\Aggregation;


interface Aggregation {

    /**
     * @return int
     */
    public function unitId();

    /**
     * @return int between 0 and 23
     */
    public function hour();

    /**
     * @return string download, upload, latency or packet_loss
     */
    public function metric();
}