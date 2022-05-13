<?php

namespace App\Controller;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\jsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[ApiResource]
class PakageController extends AbstractController
{

    public function __invoke(Request $request):Response
    {
        $name = $request->attributes->get('name');
        $price = $request->attributes->get('price');
        return new jsonResponse([
            'pakage' => ['name' => $name,
                        'price' => $price,]
        , Response::HTTP_CREATED]);   
    }


    #[Route('/api/pakage', name: 'app_pakage')]
    public function index(): Response
    {
        return new jsonResponse(['pakage' => 'Pakage']);
    }

    
    #[Route('/api/pakage/pak/{id}', name: 'app_pakage_indiv')]
    public function pakage(int $id): Response
    {
        return new jsonResponse(['pakage' => $id]);
    }
    
    #[Route('/api/pakage/all/{all}', name: 'app_pakage_all')]
    public function allPakage(): Response
    {
        return new jsonResponse(['pakage' => 'All Pakage']);
    }
}
