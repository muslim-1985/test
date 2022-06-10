<?php

declare(strict_types=1);

namespace App\User\Controller;

use App\User\Model\Service\CheckConnection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home')]
    public function index(CheckConnection $connection): JsonResponse
    {
        $cc = $connection->handle();

        return new JsonResponse($cc);
    }

}