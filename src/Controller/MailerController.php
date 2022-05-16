<?php

namespace App\Controller;

use App\Entity\SavingMail;
use App\Security\EmailVerifier;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\Address;
use App\Repository\SavingMailRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;



class MailerController extends AbstractController
{
    #[Route('/email')]
    public function sendEmail(MailerInterface $mailer,SavingMailRepository $savingMailRepository,EntityManagerInterface $entityManager,$user_id,$email,$user)
    {
        // $user = $this -> getUser();
         $user_email = $user -> getEmail();
        // $user_id = $user -> getId();
        //dd($user_email);
        $saving_mail = new SavingMail();
        $email = (new TemplatedEmail())
            ->from('Commet-AT@example.com')
            ->to($email)
            ->subject('Time for Symfony Mailer!')
            ->text('Thank you for joining our network and purchasing the package! Go to site ,<a href="http://164.92.159.123"> link </a>')
            ->htmlTemplate('emails/pakage_new.html.twig')
            ->context([
                 'date' => new \DateTime(),
            ]);
            $saving_mail -> setCategory('new_pakege');
            $saving_mail -> setUserId($user_id);
            $saving_mail -> setFromMail('Commet-AT@example.com');
            $saving_mail -> setToMail($user_email);
            $saving_mail -> setCreatedAt((new \DateTime()));
            $saving_mail -> setUpdatedAt((new \DateTime()));

            try {
                $mailer->send($email);
                $this->addFlash(
                'info',
                'An email has been sent to you confirming the purchase of the package  CoMetaClub!'); 
                $saving_mail -> setStatus('success');
                $saving_mail -> setText('Благодарим Вас за приобретение пакета!');
                $savingMailRepository -> add($saving_mail);
            } catch (TransportExceptionInterface $e) {
                $this->addFlash(
                    'danger',
                    'An unexpected failure of the mail client occurred, the CoMetaClub membership confirmation email was not sent. We apologize, we will send you a confirmation email as soon as possible.'); 
                $saving_mail -> setStatus('error');
                $saving_mail -> setText('An unexpected failure of the mail client occurred, the CoMetaClub membership confirmation email was not sent. We apologize, we will send you a confirmation email as soon as possible.');
                $savingMailRepository -> add($saving_mail);    
            }             
            $entityManager->persist($saving_mail);
            $entityManager->flush();
    }
}
