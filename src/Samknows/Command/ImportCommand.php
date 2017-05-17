<?php
/**
 * ImportCommand.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

namespace Samknows\Command;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportCommand extends ContainerCommand {

    protected function configure() {
        $this
            ->setName('import')
            ->setDescription('Import a metrics file.')
            ->addArgument('file', InputArgument::REQUIRED, 'Filename with the metrics');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $output->write('Importing metrics ... ');

        $repository = $this->container['MetricRepository'];
        $factory = $this->container['MetricArrayFactory'];
        $units = json_decode(file_get_contents($input->getArgument('file')));

        foreach ($units as $unit) {
            foreach ($this->container['MetricTypes'] as $metricType) {
                $metrics = $factory->make($unit->unit_id, $unit->metrics->{$metricType});
                $camelCase = str_replace(' ', '', ucwords(str_replace('_', ' ', $metricType)));
                $repository->{'save' . $camelCase}($metrics);
            }
        }

        $output->writeln('Completed');
    }
}