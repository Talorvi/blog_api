<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SecurityController
 * @package App\Controller
 * @Route("/api")
 */
class SecurityController
{
    /**
     * @Route("/auth/login", name="app_login", methods={"POST"})
     *
     * @return JsonResponse
     */
    public function login(): JsonResponse
    {
        // TODO: implement exception
        return new JsonResponse(['error' => 'error text']);
    }
}