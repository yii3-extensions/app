<?php

declare(strict_types=1);

namespace App\UseCase\Hello;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Yiisoft\Yii\Console\ExitCode;

#[AsCommand(name: 'hello', description: 'An example command', hidden: false)]
final class HelloCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Hello!');

        return ExitCode::OK;
    }
}
