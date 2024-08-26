<?php

declare(strict_types=1);

namespace Danilocgsilva\EntityCloneCli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RollbackMigrationCommand extends Command
{
    protected static $defaultName = 'migrate-rollback';

    protected function configure(): void
    {
        parent::configure();

        $this
            ->setName('migrate-rollback')
            ->setDescription('Your command description.')
            ->setHelp('Your command help.');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Rollback migration.");
        return Command::SUCCESS;
    }
}
