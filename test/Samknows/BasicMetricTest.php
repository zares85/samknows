<?php
/**
 * MetricTestCase.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

namespace Samknows\test;

use PHPUnit\Framework\TestCase;
use Samknows\Metric\BasicMetric;

class BasicMetricTest extends TestCase {

    public function testCreate() {
        $unitId = 1;
        $ts = new \DateTime();
        $value = 453;

        $metric = new BasicMetric($unitId, $ts, $value);

        $this->assertEquals($unitId, $metric->unitId());
        $this->assertEquals($ts, $metric->timestamp());
        $this->assertEquals($value, $metric->value());
    }
}