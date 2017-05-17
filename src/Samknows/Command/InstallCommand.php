<?php
/**
 * InstallCommand.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

namespace Samknows\Command;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstallCommand extends ContainerCommand {

    protected function configure() {
        $this->setName('install')->setDescription('Install tables into database.');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $output->write('Creating tables in database ... ');

        // Using PDO as illuminate does not support multiple statements in the same call.
        $result = $this->db->getPdo()->exec(file_get_contents($this->container['res.database.ddl']));

        $output->writeln($result !== false ? 'Success' : 'Fail');
    }
}