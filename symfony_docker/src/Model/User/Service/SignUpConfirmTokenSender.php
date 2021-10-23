<?php

declare(strict_types=1);

namespace App\Model\User\Service;

use App\Model\User\Entity\User\Email;
use Twig\Environment;

class SignUpConfirmTokenSender
{
   // private $mailer;
    private $twig;

    public function __construct( Environment $twig)
    {
     //   $this->mailer = $mailer;
        $this->twig = $twig;
    }

    public function send(Email $email, string $token): string
    {
       return "hello";
    }
}
