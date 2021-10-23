<?php


namespace Model\User\Event;


use App\Model\User\Entity\User\User;
use Symfony\Contracts\EventDispatcher\Event;

class CustomEvent extends Event
{
    public const NAME = 'custom.event';

    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}