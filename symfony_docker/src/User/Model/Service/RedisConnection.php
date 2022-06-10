<?php

namespace App\User\Model\Service;

class RedisConnection implements CheckConnectingInterface
{
    public function __construct(private CheckConnection $conn)
    {
    }

    public function isConnected(): bool
    {
        return false;
    }

    public function handle(): bool|string
    {
        if ($this->isConnected()) {
            return 'hello redis';
        }

        return false;
    }

    public function next(): CheckConnection
    {
        return $this->conn;
    }
}