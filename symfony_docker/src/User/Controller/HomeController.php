<?php

declare(strict_types=1);

namespace App\User\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home')]
    public function index(): JsonResponse
    {
        return new JsonResponse('hello');
    }

}