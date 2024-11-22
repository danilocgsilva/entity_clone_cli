<?php

use Danilocgsilva\EntityCloneCli\CloneEntity;

require("vendor/autoload.php");

use Symfony\Component\Console\Application;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;
use Danilocgsilva\EntityCloneCli\MigrateCommand;
use Danilocgsilva\EntityCloneCli\RollbackMigrationCommand;

/** @var ContainerInterface $container */
$container = (new ContainerBuilder())
    ->build();

/** @var Application $application */
$application = $container->get(Application::class);

$application->add($container->get(MigrateCommand::class));
$application->add($container->get(RollbackMigrationCommand::class));
$application->add($container->get(CloneEntity::class));

$application->run();
