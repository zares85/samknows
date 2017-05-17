<?php
/**
 * app.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$container = new Pimple\Container;

$container['res.database.ddl'] = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'res' . DIRECTORY_SEPARATOR . 'database.ddl';
$container['config.database.json'] = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'database.json';

$capsule = new Illuminate\Database\Capsule\Manager();
$capsule->addConnection(json_decode(file_get_contents($container['config.database.json']), true));
$container['db'] = $capsule->getConnection();
$container['MetricTypes'] = ['download', 'upload', 'latency', 'packet_loss'];
$container['MetricArrayFactory'] = new \Samknows\Metric\MetricArrayFactory;
$container['MetricRepository'] = new \Samknows\Repository\IlluminateMetricRepository($container['db']);

return $container;