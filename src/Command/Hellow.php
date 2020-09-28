<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class Hellow extends Command
{
    protected static $defaultName = 'hellow';

    public function __construct()
    {
        parent::__construct();
    }

    public function configure(): void
    {
        $this->setDescription('Hellow command example');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Hellow Command");

        return 1;
    }
}
