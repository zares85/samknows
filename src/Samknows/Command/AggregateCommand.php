<?php
/**
 * AggregateCommand.php
 *
 * @package
 * @author    Carlos Jurado <carlos.jurado@kineo.com>
 * @copyright 2017 City and Guilds Kineo
 * @license   http://www.kineo.com
 */

namespace Samknows\Command;

use Samknows\Aggregation\BasicAggregation;
use Samknows\Repository\MetricRepository;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AggregateCommand extends ContainerCommand {

    protected function configure() {
        $this
            ->setName('aggregate')
            ->setDescription('Install tables into database.')
            ->addArgument('unit', InputArgument::REQUIRED, 'Unit id')
            ->addArgument('metric', InputArgument::REQUIRED, 'download, upload, latency, packet_loss')
            ->addArgument('hour', InputArgument::OPTIONAL, '0 to 23')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $unit = $input->getArgument('unit');
        $metric = $input->getArgument('metric');
        $hour = $input->getArgument('hour');

        /** @var MetricRepository $repository */
        $repository = $this->container['MetricRepository'];
        $aggregation = new BasicAggregation($unit, $hour, $metric);
        $result = $repository->aggregate($aggregation);

        $output->writeln("Mean {$result->mean()}");
        $output->writeln("Minimum {$result->minimum()}");
        $output->writeln("Maximum {$result->maximum()}");
        $output->writeln("Median {$result->median()}");
        $output->writeln("Sample size {$result->count()}");
    }

}