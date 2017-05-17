<?php
/**
 * Result.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

namespace Samknows\Result;


use Samknows\Aggregation\Aggregation;

interface Result {

    /**
     * @return Aggregation
     */
    public function aggregation();

    /**
     * @return float
     */
    public function mean();

    /**
     * @return float
     */
    public function minimum();

    /**
     * @return float
     */
    public function maximum();

    /**
     * @return float
     */
    public function median();
}