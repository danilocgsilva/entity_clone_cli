<?php

declare(strict_types=1);

namespace Danilocgsilva\EntityCloneCli;

use Exception;

class CloneEntityQuestionsData
{
    private string $sourceHost;

    private string $sourceUsername;

    private string $sourcePassword;

    private string $databaseName;

    public static $questions = [
        "Write the database name: ",
        "Write the source database host: ",
        "Write the source username: ",
        "Write the source password: ",
    ];

    public function store(string $valueGiven, string $questionTitle): void
    {
        switch ($questionTitle) {
            case "Write the database name: ":
                $this->databaseName = $valueGiven;
                break;
            case "Write the source database host: ":
                $this->sourceHost = $valueGiven;
                break;
            case "Write the source username: ":
                $this->sourceUsername = $valueGiven;
                break;
            case "Write the source password: ":
                $this->sourcePassword = $valueGiven;
                break;
            default:
                throw new Exception("Question not known.");
        }
    }

    public function getDatabaseName(): string
    {
        return $this->databaseName;
    }

    public function getSourceHost(): string
    {
        return $this->sourceHost;
    }

    public function getSourceUsername(): string
    {
        return $this->sourceUsername;
    }

    public function getSourcePassword(): string
    {
        return $this->sourcePassword;
    }
}
