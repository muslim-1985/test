<?php

namespace App\User\Model\Service;

class CheckConnection
{
    public function __construct(
        private ?CheckConnectingInterface $connecting
    ){
    }

    public function handle(): bool|array
    {
        if ($this->isConnecting()) {
            $cc = $this->next()->handle();
            return $this->next()->handle();
        }

        return ['ccc'];
    }

    private function next()
    {
        return $this->connecting->next();
    }

    private function isConnecting(): bool
    {
        return $this->connecting->next() !== null;
    }
}