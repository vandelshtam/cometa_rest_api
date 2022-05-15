<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use OpenApi\Analysis;
use AppBundle\Entity\Reward;
use OpenApi\Annotations as OA;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Nelmio\ApiDocBundle\Annotation\Model;
use ApiPlatform\Core\Annotation\ApiResource;
use Nelmio\ApiDocBundle\Annotation\Security;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[ApiResource]
#[Route('/api/user')]
class UserController extends AbstractController
{

   //  public function __invoke(Analysis $analysis):Response
   //  {
   //      return new jsonResponse(['status' => 'ok',
   //                                  'user' => 'techno']);   
   //  }

    #[Route('/', name: 'app_user')]
    public function index(UserRepository $userRepository,SerializerInterface $serializer):Response 
    {
      $users = $userRepository->findAll();
      $jsonUsers = $serializer->serialize($users, 'json');
      $count = count($userRepository->findAll());
      $controller_name = 'All users';
      $title = 'All users';
       return new jsonResponse(['users' => $jsonUsers,
                                 'count' => $count,
                                 'controller_name' => $controller_name,
                                 'title' => $title,
                                 ]);
    }

    #[Route('/{id}', name: 'app_user_show')]
    public function show(Request $request,SerializerInterface $serializer,ManagerRegistry $doctrine,int $id):Response 
    {
      $entityManager = $doctrine->getManager(); 
      $user =  $entityManager->getRepository(User::class)->findOneBy(['id' => $id]);
      $name = 'hhh';
      $email = '555@555';
      //dd($user);
      $jsonUser = $serializer->serialize($user, 'json');
      $controller_name = 'Show user';
      $title = 'Show user';
      //$data_encode = json_decode($request->getContent());
      $data = $request->query;
      $data_encode = json_decode($request->getContent());
      $email_user = $data_encode;
      //dd($email_user);
      $jsonData = $serializer->serialize($data, 'json');
      //dd($data);
      if($request){
         return new jsonResponse(['user' => [
                                    'name' => $name,
                                    'email' => $email,
                                 'controller_name' => $controller_name,
                                 'title' => $title,
                                 'createdData'=> ('fgfgf'),
                                 'data' => $jsonData,
                                 'user' => $jsonUser,
         ], Response::HTTP_CREATED ]);
      }
       return new jsonResponse(['user' => $jsonUser,
                                 'controller_name' => $controller_name,
                                 'title' => $title,
                                 'data' => $jsonData,
                                 ]);
    }

   //  #[Route('/{id}', name: 'app_user_show')]
   //  public function show(Request $request,SerializerInterface $serializer,ManagerRegistry $doctrine,int $id):Response 
   //  {
   //    $entityManager = $doctrine->getManager(); 
   //    $user =  $entityManager->getRepository(User::class)->findOneBy(['id' => $id]);
   //    $name = 'hhh';
   //    $email = '555@555';
   //    //dd($user);
   //    $jsonUser = $serializer->serialize($user, 'json');
   //    $controller_name = 'Show user';
   //    $title = 'Show user';
   //    //$data_encode = json_decode($request->getContent());
   //    $data = $request->query;
   //    //$data = $request->getContent();
   //    $data_encode = json_decode($request->getContent());
   //    $email_user = $data_encode;
   //   // dd($data_encode);
   //    $jsonData = $serializer->serialize($data, 'json');
   //    //dd($data);
   //    if($request){
   //       //dd($data_encode);
   //       return new jsonResponse(['user' => [
   //                                  'name' => $name,
   //                                  'email' => $email,
   //                               'controller_name' => $controller_name,
   //                               'title' => $title,
   //                               'createdData'=> ('fgfgf'),
   //                               'data' => $jsonData,
   //       ], Response::HTTP_CREATED ]);
   //    }
   //    else{
   //       return new jsonResponse(['user' => $jsonUser,
   //                               'controller_name' => $controller_name,
   //                               'title' => $title,
   //                               'data' => $jsonData,
   //                               ]);
   //   }
       
   //  }  
    
    
}
