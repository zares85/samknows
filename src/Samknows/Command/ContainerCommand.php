<?php
/**
 * ContainerCommand.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

namespace Samknows\Command;

use Illuminate\Database\Connection;
use Pimple\Container;
use Symfony\Component\Console\Command\Command;

class ContainerCommand extends Command {

    /**
     * @var Container
     */
    protected $container;

    /**
     * @var Connection
     */
    protected $db;

    /**
     * ContainerCommand constructor.
     *
     * @param Container $container
     * @param string $name
     */
    public function __construct($container, $name = null) {
        $this->container = $container;
        $this->db = $container['db'];
        parent::__construct($name);
    }
}