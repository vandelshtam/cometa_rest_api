<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Pakege;
use App\Entity\ReferralNetwork;
use App\Entity\FastConsultation;
use App\Form\FastConsultationType;
use App\Controller\MailerController;
use App\Entity\ListReferralNetworks;
use App\Form\ListReferralNetworksType;
use App\Repository\SavingMailRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReferralNetworkRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use App\Controller\FastConsultationController;
use App\Repository\ListReferralNetworksRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[ApiResource]
#[Route('/api/referral')]
class ListReferralNetworksController extends AbstractController
{
    #[Route('/list/referral/networks', name: 'app_list_referral_networks')]
    public function index(): Response
    {
        return $this->render('list_referral_networks/index.html.twig', [
            'controller_name' => 'ListReferralNetworksController',
        ]);
    }

    #[Route('/new/{pakage_id}', name: 'app_list_referral_networks_new_confirm', methods: ['GET', 'POST'])]
    public function newConfirm(Request $request, SerializerInterface $serializer, ManagerRegistry $doctrine, ListReferralNetworksRepository $listReferralNetworksRepository, ReferralNetworkRepository $referralNetworkRepository,SavingMailRepository $savingMailRepository, int $pakage_id): Response
    {  
        $controller_name = 'New referral network';
        $title = 'New referral network';
        $data = $request->query;
        $user_id = $data->get('user_id');
        //$user_id = 1;
        $owner_name = $data->get('referral_name');
        //$owner_name = 'CoMetaClub';
        // $jsonUser_id = $serializer->serialize($user_id, 'json');
        // return new jsonResponse([//'user' => $jsonUser,
        //     'user_id' => $jsonUser_id,
        //     //'referral_link' => $jsonUser_id,
        //     'controller_name' => $controller_name,
        //     'title' => $title,                     
        //     Response::HTTP_CREATED ]);
        $entityManager = $doctrine->getManager();
        $listReferralNetwork = new ListReferralNetworks();
        //$id переданный в агрументе id пакета пользователя пришедшего для записи в качестве члена сети, в данном случае совпадает с владельцем сети
        $pakege = $entityManager->getRepository(Pakege::class)->findOneBy(['id' => $pakage_id]);//пакет основателя сети
        $user_table = $entityManager->getRepository(User::class)->findOneBy(['id' => $user_id]);
        $balance = $pakege -> getPrice();
        $client_code = $pakege -> getClientCode();
        $unique_code = $pakege -> getUniqueCode();//уникальный код сети генерировался на этапе начального создания 
        //$network_code - уникальный код реферальной сети
        $network_code = $pakage_id.'-'.$unique_code;//первая част до тире "id реферальной сети " - после тире "уникальный код сети" который одинаковый с уникальным кодом пакета unique_code
        $date = new \DateTime();
        $listReferralNetwork -> setOwnerId($user_id);
        $listReferralNetwork -> setOwnerName($owner_name);
        $listReferralNetwork -> setClientCode($client_code);
        $listReferralNetwork -> setNetworkCode($network_code);
        $listReferralNetwork -> setUniqueCode($unique_code);
        $listReferralNetwork -> setProfitNetwork(0);//общая сумма очислений в проект (владельцам проекта)
        $listReferralNetwork -> setPaymentsDirect(0);//общая сумма начисленных доходов в сеть по программе Директ
        $listReferralNetwork -> setPaymentsCash(0);//общая сумма начисленных в сети доходов по программе КешБек
        $listReferralNetwork -> setSystemRevenues(0);//общая сумма начисленных  доходов в систему (30%)
        $listReferralNetwork -> setCurrentBalance(0);//общая сумма стоимости пакетов в сети (не погашенных)
        $listReferralNetwork -> setCreatedAt($date);
        $listReferralNetwork -> setUpdatedAt($date);
        $listReferralNetworksRepository->add($listReferralNetwork);
        $entityManager->persist($listReferralNetwork);
        $entityManager->flush();

        $new_listReferralNetwork = $entityManager->getRepository(ListReferralNetworks::class)->findOneBy(['owner_id' => $user_id]);
        $new_listReferralNetwork_id = $new_listReferralNetwork -> getId();// id реферальной сети
        //$network_code - уникальный код реферальной сети
        $network_code = $pakage_id.'-'.$unique_code;//первая част до тире "id реферальной сети " - после тире "уникальный код сети" который одинаковый с уникальным кодом пакета unique_code
        $member_code = $new_listReferralNetwork_id.'-'.$user_id.'-'.$pakage_id.'-'.$unique_code;//инидивидуальный уникальный код записи члена реферальной сети - он же реферальная ссылка пользователя для приглашения новых партнеров - ссылка рефовода
        //запись владельца сети в качестве - члена реферальной сети
        $referral_network = new ReferralNetwork();
        $referral_network -> setUserId($user_id);
        $referral_network -> setPakegeId($pakage_id);
        $referral_network -> setNetworkId($new_listReferralNetwork_id);
        $referral_network -> setUserStatus('owner');
        $referral_network -> setBalance($balance);
        $referral_network -> setPakage($balance);
        $referral_network -> setNetworkCode($network_code);
        $referral_network -> setMemberCode($member_code);//первая часть до первого тире "id пакета приглашенного участника сети (т.е. id пакета приглашенного )" -  вторая часть перед вторым тире, "id пакета владельца сети (т.е. id пакета)" - после тире "уникальный код сети" 
        $referral_network -> setMyTeam(0);
        $referral_network -> setReward(0);//сумма начислений дохода пользователя в сети
        $referral_network -> setCash(0);//сумма начисления  дохода пользователю  по системе КэшБек
        $referral_network -> setDirect(0);//сумма начислений в сети пользователю по программе Директ
        $referral_network -> setCurrentNetworkProfit(0);//текщее отчисление  в доход проекта от погашения пакетов в момент активации пакета нвого пользователя
        $referral_network -> setPaymentsNetwork(0);//начисление в сеть по программе Директ в момент активации нового пакета
        $referral_network -> setPaymentsCash(0);//начисление в сеть по программе КешБек в момент активации нового пакета 
        $referral_network -> setRewardWallet(0);//остаток начислений доступных для вывода на кошелек пользователя
        $referral_network -> setWithdrawalToWallet(0);//общая сумма выведенных на кошелек начисленых доходов пользователя
        $listReferralNetwork -> setSystemRevenues(0);//общая сумма начисленных  доходов в систему (30%)
        $referral_network -> setCreatedAt($date);
        $referral_network -> setUpdatedAt($date);
        $pakege -> setActivation(1);//признак активации пакета
        $pakege -> setReferralNetworksId($member_code);
        $referralNetworkRepository->add($referral_network);
        $entityManager->persist($referral_network);
        $entityManager->flush();

        $this->addFlash(
            'success',
            'You have successfully activated the package and created a new referral network.');
        
        $notice = ['sacces' => 'You have successfully activated the package and created a new referral network.'];
        $new_referral_network = $entityManager->getRepository(ReferralNetwork::class)->findOneBy(['pakege_id' => $pakage_id]);
        $jsonNew_referral_network = $serializer->serialize($new_referral_network, 'json');
        return new jsonResponse([//'user' => $jsonUser,
            'new_network' => $jsonNew_referral_network,
            //'referral_link' => $jsonReferral_link,
            'controller_name' => $controller_name,
            'title' => $title,
            'notice' => $notice,                        
            Response::HTTP_CREATED ]);
    }
}
