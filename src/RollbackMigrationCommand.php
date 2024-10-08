<?php

declare(strict_types=1);

namespace Danilocgsilva\EntityCloneCli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RollbackMigrationCommand extends Command
{
    use PdoTrait;
    
    protected static $defaultName = 'migrate-rollback';

    protected function configure(): void
    {
        parent::configure();

        $this
            ->setName('migrate-rollback')
            ->setDescription('Undo migration');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $scriptRollback = sprintf("DROP DATABASE %s;", getenv("ENTITY_CLONE_DATABASE_NAME"));

        $this->getPdo()->prepare($scriptRollback)->execute();
        
        $output->writeln("Rollback migration done.");

        return Command::SUCCESS;
    }
}
