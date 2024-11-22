<?php

declare(strict_types=1);

namespace Danilocgsilva\EntityCloneCli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Danilocgsilva\EntityCloneCli\CloneEntityQuestionsData;

class CloneEntity extends Command
{
    protected function configure(): void
    {
        parent::configure();

        $this
            ->setName('clone_entity')
            ->setDescription('Migrate database');
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $helper = $this->getHelper('question');

        $cloneEntityQuestionsData = new CloneEntityQuestionsData();
        foreach (CloneEntityQuestionsData::$questions as $questionTitle) {
            $question = new Question($questionTitle);
            $cloneEntityQuestionsData->store(
                $helper->ask($input, $output, $question),
                $questionTitle
            );
        }

        $output->writeln("The source host database is " . $cloneEntityQuestionsData->getSourceHost());
        $output->writeln("Command executed.");
        return Command::SUCCESS;
    }
}
