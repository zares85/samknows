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
use Illuminate\Database\Query\Builder;
use Samknows\Aggregation\Aggregation;
use Samknows\Metric\Metric;
use Samknows\Result\BasicResult;
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
     * @return array
     */
    protected function getInsertValues($metrics) {
        $values = [];

        foreach ($metrics as $metric) {
            $values[] = [
                'unit_id' => $metric->unitId(),
                'ts'      => $metric->timestamp(),
                'value'   => $metric->value(),
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
        $this->db->table('packet_loss')->insert($this->getInsertValues($metrics));
    }

    /**
     * @param Aggregation $aggregation
     * @return Result
     */
    public function aggregate(Aggregation $aggregation) {
        $builder = $this->db->table($aggregation->metric())->where('unit_id', '=', $aggregation->unitId());

        if ($hour = $aggregation->hour()) {
            $builder = $builder->whereRaw('HOUR(`ts`) = ?', [$aggregation->hour()]);
        }

        return new BasicResult(
            $aggregation,
            $builder->avg('value'),
            $builder->min('value'),
            $builder->max('value'),
            $this->mean($builder),
            $builder->count()
        );
    }

    /**
     * Calculate the mean.
     *
     * count the number of rows in the table with
     * SELECT COUNT(*) FROM {table name}
     * if the retrieved number of rows is odd, get the value directly with
     * SELECT {column name} FROM {table name} ORDER BY {column name} LIMIT {(total number of rows in table-1)/2},1
     * if the number of rows is even, get the two relevant values from the table with
     * SELECT {column name} FROM {table name} ORDER BY {column name} LIMIT {(total number of rows in table/2)-1},2
     * add them afterwards and divide the results by 2
     *
     * @param Builder $builder
     * @return float|int
     */
    protected function mean(Builder $builder) {
        $count = $builder->count();

        if ($count == 0) {
            return null;
        } elseif ($count % 2) {
            $offsset = ($count - 1) / 2;

            return $builder->orderBy('value')->offset($offsset)->limit(1)->value('value');
        } else {
            $offsset = ($count / 2) - 1;
            $records = $builder->orderBy('value')->offset($offsset)->limit(2)->get(['value']);

            return (reset($records)->value + end($records)->value) / 2;
        }
    }
}