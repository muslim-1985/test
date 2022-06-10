<?php

namespace App\User\Model\Service;

class SqlDatabaseConnection implements CheckConnectingInterface
{

    public function isConnected(): bool
    {
        return true;
    }

    public function handle(): bool|string
    {
        if ($this->isConnected()) {
            return 'hello sql';
        }

        return false;
    }

    public function next()
    {
        return null;
    }
}