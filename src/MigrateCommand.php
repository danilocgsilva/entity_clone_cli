<?php

declare(strict_types=1);

namespace Danilocgsilva\EntityCloneCli;

use Danilocgsilva\ClassToSqlSchemaScript\FieldScriptSpitter;
use Danilocgsilva\ClassToSqlSchemaScript\TableScriptSpitter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Danilocgsilva\ClassToSqlSchemaScript\DatabaseScriptSpitter;

class MigrateCommand extends Command
{
    use PdoTrait;

    protected static $defaultName = 'migrate';

    protected function configure(): void
    {
        parent::configure();

        $this
            ->setName('migrate')
            ->setDescription('Migrate database');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $databaseScriptSpitter = new DatabaseScriptSpitter(getenv("ENTITY_CLONE_DATABASE_NAME"));
        $databaseScriptSpitter->setUseSelf();
        $tableScriptSpitter = (new TableScriptSpitter("databases"))
            ->addField((new FieldScriptSpitter("id"))
                    ->setPrimaryKey()
                    ->setType("INT")
                    ->setNotNull()
                    ->setAutoIncrement()
                    ->setUnsigned()
            )
            ->addField(
                (new FieldScriptSpitter("name"))->setType("VARCHAR(255)")->setNotNull()
            )
            ->addField(
                (new FieldScriptSpitter("description"))->setType("VARCHAR(255)")
            )
            ->setEscape();
        $databaseScriptSpitter->addTableScriptSpitter($tableScriptSpitter);
        $output->writeln($databaseScriptSpitter->getScript());
        $this->getPdo()->prepare($databaseScriptSpitter->getScript())->execute();
        $output->writeln("Migration done.");
        return Command::SUCCESS;
    }
}
