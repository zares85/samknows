<?php
/**
 * BasicAggregationTest.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

namespace Samknows;

use PHPUnit\Framework\TestCase;
use Samknows\Aggregation\BasicAggregation;

class BasicAggregationTest extends TestCase {

    public function testCreate() {
        $unitId = 2;
        $hour = 12;

        $aggregation = new BasicAggregation($unitId, $hour);

        $this->assertEquals($unitId, $aggregation->unitId());
        $this->assertEquals($hour, $aggregation->hour());
    }
}