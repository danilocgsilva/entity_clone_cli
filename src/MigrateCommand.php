<?php

declare(strict_types=1);

namespace Danilocgsilva\EntityCloneCli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MigrateCommand extends Command
{
    protected static $defaultName = 'migrate';

    protected function configure(): void
    {
        parent::configure();
        
        $this
            ->setName('migrate')
            ->setDescription('Your command description.')
            ->setHelp('Your command help.');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("Migration!");
        return Command::SUCCESS;
    }
}
