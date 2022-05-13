<?php
declare(strict_types=1);

namespace App\Controller;

use OpenApi\Analysis;
use AppBundle\Entity\User;
use AppBundle\Entity\Reward;
use OpenApi\Annotations as OA;
use Doctrine\ORM\Mapping\Entity;
use Nelmio\ApiDocBundle\Annotation\Model;
use ApiPlatform\Core\Annotation\ApiResource;
use Nelmio\ApiDocBundle\Annotation\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\jsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[ApiResource]
class UserController extends AbstractController
{

    public function __invoke(Analysis $analysis):Response
    {
        return new jsonResponse(['status' => 'ok',
                                    'user' => 'techno']);   
    }

    #[Route('/', name: 'app_user')]
    
    public function indexes():Response 
    {
       
       return new jsonResponse(['status' => 'status ok nnnnn']);
    }
    
    #[Route('/api/user', name: 'app_user_kkk')]
    
    public function index():Response 
    {
       
       return new jsonResponse(['status' => 'status ok']);
    }

    #[Route('/api/user/{id}', name: 'app_user_name')]
    public function user(int $id):Response 
    {
       return new jsonResponse(['number' => $id]);
    }
}
