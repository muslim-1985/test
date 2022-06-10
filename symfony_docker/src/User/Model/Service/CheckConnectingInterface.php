<?php

namespace App\User\Model\Service;

interface CheckConnectingInterface
{
    public function isConnected(): bool;

    public function handle(): bool|string;
}