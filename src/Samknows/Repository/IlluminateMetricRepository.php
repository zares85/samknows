<?php
/**
 * IlluminateMetricRepository.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

namespace Samknows\Repository;

use Illuminate\Database\ConnectionInterface;
use Samknows\Aggregation\Aggregation;
use Samknows\Metric\Metric;
use Samknows\Result\Result;

class IlluminateMetricRepository implements MetricRepository {

    /**
     * @var ConnectionInterface
     */
    protected $db;

    /**
     * IlluminateMetricRepository constructor.
     *
     * @param ConnectionInterface $db
     */
    function __construct(ConnectionInterface $db) {
        $this->db = $db;
    }

    /**
     * Convert Metrics into a arrays ready to be inserted into database.
     *
     * @param Metric[] $metrics
     * @param string $type
     * @return array
     */
    protected function getInsertValues($metrics, $type = 'int') {
        $values = [];

        foreach ($metrics as $metric) {
            $value = $metric->value();
            $values[] = [
                'unit_id' => $metric->unitId(),
                'ts'      => $metric->timestamp(),
                'value'   => settype($value, $type),
            ];
        }

        return $values;
    }

    /**
     * @param Metric[] $metrics
     */
    public function saveDownload(array $metrics) {
        $this->db->table('download')->insert($this->getInsertValues($metrics));
    }

    /**
     * @param Metric[] $metrics
     */
    public function saveUpload(array $metrics) {
        $this->db->table('upload')->insert($this->getInsertValues($metrics));
    }

    /**
     * @param Metric[] $metrics
     */
    public function saveLatency(array $metrics) {
        $this->db->table('latency')->insert($this->getInsertValues($metrics));
    }

    /**
     * @param Metric[] $metrics
     */
    public function savePacketLoss(array $metrics) {
        $this->db->table('packet_loss')->insert($this->getInsertValues($metrics, 'float'));
    }

    /**
     * @param Aggregation $aggregation
     * @return Result
     */
    public function aggregate(Aggregation $aggregation) {
        // TODO: Implement aggregate() method.
        return null;
    }
}