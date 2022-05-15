<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Pakege;
use App\Entity\TokenRate;
use App\Entity\TablePakage;
use App\Entity\TransactionTable;
use App\Repository\UserRepository;
use App\Repository\PakegeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\ReferralNetwork;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\TransactionTableRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[ApiResource]
#[Route('/api/pakege')]
class PakegeController extends AbstractController
{
   
    #[Route('/new/{user_id}', name: 'app_pakege_new')]
    public function newPakage(Request $request,UserRepository $userRepository,PakegeRepository $pakegeRepository,EntityManagerInterface $entityManager, TransactionTableRepository $transactionTableRepository,SerializerInterface $serializer,ManagerRegistry $doctrine,int $user_id):Response 
    {
        //в request или json получаем referral_link - рефовода, id - пакета из таблицы обзора пакетов, id-  пользователя
        $entityManager = $doctrine->getManager(); 
        $controller_name = 'New pakage';
        $title = 'New pakage';
        $data = $request->query;
        //если пользовател приобретает пакет впервые сначала создаем запись в таблицу user
        if($entityManager->getRepository(User::class)->findOneBy(['user_id' => $user_id]) == false){
            $new_user = new User();
            $new_user->setCreatedAt(new \DateTime());
            $new_user -> setUpdatedAt(new \DateTime());
            $referral_link = $data->get('referral_link');
            $random_code = 'CP'.mt_rand();
            $client_code = $user_id.$random_code;
            $secret_code = mt_rand().'-'.mt_rand();
            $new_user->setUsername('new_name');
            $new_user->setUserId($user_id);
            $new_user->setPesonalCode($client_code);
            $new_user->setSecretCode($secret_code);
            $new_user->setReferralLink($referral_link);
            $new_user->setRoles(["ROLE_USER"]);
            $new_user->setMultiPakage(0);
            $new_user->setPakageStatus(0);
            $userRepository->add($new_user);
            $entityManager->persist($new_user);
            $entityManager->flush();
        }
        //запись в таблицу пакетов новый пакет пользователя
        $user = $entityManager->getRepository(User::class)->findOneBy(['user_id' => $user_id]);
        $transaction = new TransactionTable();
        $pakege = new Pakege();
        $unique_code1 = $this->random_string(10);
        $unique_code2 = $this->random_string(10);
        $unique_code = $unique_code1.$unique_code2;
        $token_table =  $entityManager->getRepository(TokenRate::class)->findOneBy(['id' => 1]) -> getExchangeRate();
        $pakage_table_id = $data->get('pakage_table_id');
        //$referral_link = $data->get('referral_link');
        $referral_link = $user->getReferralLink();
        //$pakage_user = $entityManager->getRepository(TablePakage::class)->findOneBy(['name' => $pakage_name]); 
        $pakage_table = $entityManager->getRepository(TablePakage::class)->findOneBy(['id' => $pakage_table_id]);
        //$pakage_table = $entityManager->getRepository(TablePakage::class)->findOneBy(['id' => 1]);
        $pakage_name_table = $pakage_table -> getName();
        $token_rate = $entityManager->getRepository(TokenRate::class)->findOneBy(['id' => 1]) -> getExchangeRate();
        $pakage_user_price = $pakage_table -> getPricePakage();
        $price_token = $pakage_user_price * $token_rate;
        $client_code = $user -> getPesonalCode();
        $price_usdt = $pakage_table -> getPricePakage();
        $price_token = $price_usdt * $token_table;
        $pakege -> setReferralLink($referral_link); 
        $pakege -> setCreatedAt(new \DateTime());
        $pakege -> setUpdatedAt(new \DateTime());
        $pakege -> setUserId($user_id);
        $pakege -> setPrice($pakage_user_price);
        $pakege -> setName($pakage_name_table);
        $pakege -> setUniqueCode($unique_code);
        $pakege -> setActivation(0);//код активации пакета
        $pakege -> setAction(0);//код нового пакета приобретенного без акции акции
        $pakege -> setToken($price_token);
        $pakege -> setClientCode($client_code); 
        $pakegeRepository->add($pakege);
        $entityManager->persist($pakege); 
        $user -> setPakageStatus(0);
        $entityManager->persist($user); 
        $entityManager->flush();
        $pakage_id = $entityManager->getRepository(Pakege::class)->findOneBy(['unique_code' => $unique_code])->getId(); 
        
        //запись в таблицу тразакций
        $transaction  -> setCreatedAt(new \DateTime());
        $transaction  -> setUpdatedAt(new \DateTime()); 
        $transaction -> setPakagePrice($pakage_user_price);
        $transaction -> setUserId($user_id);
        $transaction -> setPakageId($pakage_id);
        $transaction -> setSomme($pakage_user_price);
        $transaction -> setToken('usdt');
        $transaction -> setType(7);
        $transactionTableRepository -> add($transaction);
        $entityManager->persist($transaction);
        $entityManager->flush();
        //==========================   
        // $mailerController->sendEmail($mailer,$savingMailRepository);
        $this->addFlash(
            'success',
            'Congratulations! You have successfully purchased a new package.');
        $this->addFlash(
            'info',
            'In order for the package to start working for you, you must activate the package. Activate the package!'); 
            
        //$data = $request->getContent();
        // $data_request = $request->query;
        // $referral_link = $data_request->get('referral_link');
        //$data = $request->attributes->get('user_id');
        //dd($data);
        //$jsonData = $serializer->serialize($data, 'json');
        $jsonPakage_id = $serializer->serialize($pakage_table_id, 'json');
        //$jsonReferral_link = $serializer->serialize($referral_link, 'json');
        //$jsonUser = $serializer->serialize($user, 'json');
        $notice = ['sacces' => 'succes operations'];
        return new jsonResponse([//'user' => $jsonUser,
                                'data' => $jsonPakage_id,
                                //'referral_link' => $jsonReferral_link,
                                'controller_name' => $controller_name,
                                'title' => $title,
                                'notice' => $notice,                        
        Response::HTTP_CREATED ]);

    }  


    private function random_string ($str_length)
    {
    $str_characters = array (0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

	// Функция может генерировать случайную строку и с использованием кириллицы
    //$str_characters = array (0,1,2,3,4,5,6,7,8,9,'а','б','в','г','д','е','ж','з','и','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','э','ю','я');

    // Возвращаем ложь, если первый параметр равен нулю или не является целым числом
    if (!is_int($str_length) || $str_length < 0)
    {
        return false;
    }

    // Подсчитываем реальное количество символов, участвующих в формировании случайной строки и вычитаем 1
    $characters_length = count($str_characters) - 1;

    // Объявляем переменную для хранения итогового результата
    $string = '';

    // Формируем случайную строку в цикле
    for ($i = $str_length; $i > 0; $i--)
    {
        $string .= $str_characters[mt_rand(0, $characters_length)];
    }

    // Возвращаем результат
    return $string;
    }

}
