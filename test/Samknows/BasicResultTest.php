<?php
/**
 * BasicResultTest.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

namespace Samknows;

use PHPUnit\Framework\TestCase;
use Samknows\Aggregation\Aggregation;
use Samknows\Result\BasicResult;

class BasicResultTest extends TestCase {

    public function testCreate() {
        $aggregation = \Mockery::mock(Aggregation::class);
        $mean = 23.5;
        $minimum = 12;
        $maximum = 55;
        $median = 30;

        $result = new BasicResult($aggregation, $mean, $minimum, $maximum, $median);

        $this->assertEquals($aggregation, $result->aggregation());
        $this->assertEquals($mean, $result->mean());
        $this->assertEquals($minimum, $result->minimum());
        $this->assertEquals($maximum, $result->maximum());
        $this->assertEquals($median, $result->median());
    }
}