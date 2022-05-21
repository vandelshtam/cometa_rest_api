<?php

namespace App\Controller;

use App\Entity\User;
use Webmozart\Assert\Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

#[ApiResource]
class ApiLoginController extends AbstractController
{
    #[Route('/api/login/me', name: 'app_api_login')]
    
    public function index(#[CurrentUser] ?UserInterface $user,Request $request): Response
      {
        //  /** @var AuthUserInterface $user */
        // $user = $this->security->getUser();
        $data = $request->query;
        //dd($data);

         if (null === $user) {
             return new jsonResponse([
                 'message' => 'missing credentials',
             ], Response::HTTP_CREATED);
         }

         $token = 'FGhgyhrf6576765hghgfuhfg'; // somehow create an API token for $user

          return $this->json([

             'user'  => $user->getUserIdentifier(),
             'token' => $token,
          ]);
      }
}
