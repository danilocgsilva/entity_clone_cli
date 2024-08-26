<?php

declare(strict_types=1);

namespace Danilocgsilva\EntityCloneCli;

use PDO;

trait PdoTrait
{
    public function getPdo(): PDO
    {
        return new PDO(
            sprintf("mysql:host=%s;dbname=%s", getenv('ENTITY_CLONE_DATABASE_HOST'), getenv('ENTITY_CLONE_DATABASE_NAME')),
            getenv('ENTITY_CLONE_DATABASE_USER'),
            getenv('ENTITY_CLONE_DATABASE_PASSWORD')
        );
    }
}