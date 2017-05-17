<?php
/**
 * MetricRepository.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

namespace Samknows\Repository;


interface MetricRepository {

    public function saveDownload();

    public function saveUpload();

    public function saveLatency();

    public function savePacketLoss();
}