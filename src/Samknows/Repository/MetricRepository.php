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


use Samknows\Metric\Metric;

interface MetricRepository {

    /**
     * @param Metric[] $metrics
     */
    public function saveDownload(array $metrics);

    /**
     * @param Metric[] $metrics
     */
    public function saveUpload(array $metrics);

    /**
     * @param Metric[] $metrics
     */
    public function saveLatency(array $metrics);

    /**
     * @param Metric[] $metrics
     */
    public function savePacketLoss(array $metrics);
}