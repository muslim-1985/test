<?php


namespace App\EventListener\User;


use JetBrains\PhpStorm\Pure;
use Model\User\Event\CustomEvent;

class CustomListener
{
    #[Pure]
    public function onCustomEvent(CustomEvent $event): void
    {
        $user = $event->getUser();
        $cc=0;
    }
}