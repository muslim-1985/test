<?php

namespace App\User\Model\Service;

class MongoDbConnection implements CheckConnectingInterface
{
    public function __construct(private CheckConnection $conn)
    {
    }

    public function isConnected(): bool
    {
        return true;
    }

    public function handle(): bool|string
    {
        if ($this->isConnected()) {
            return 'hello mongo';
        }

        return false;
    }

    public function next(): CheckConnection
    {
        return $this->conn;
    }
}