<?php

declare(strict_types=1);

namespace App\Controller;

use App\Security\UserFetcherInterface;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

#[ApiResource]
#[Route('/api/users/me', methods: ['GET'])]
class GetMeAction
{
    // #[Route('/ind', methods: ['GET'])]
    // public function index(){
    //     dd('Ghbdtn!!!');
    // }
    
    public function __construct(private UserFetcherInterface $userFetcher)
    {
    }

    //#[Route('/ind', methods: ['GET'])]
    public function __invoke(): JsonResponse
    {
        $user = $this->userFetcher->getAuthUser();

        return new JsonResponse([
            'ulid' => $user->getUlid(),
            'email' => $user->getEmail(),
        ]);
    }
}