<?php

namespace App\Security;

use Webmozart\Assert\Assert;
use App\Security\UserFactory;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:users:create-user',
    description: 'create user',
)]
final class CreateUser extends Command
{
    public function __construct(
        private  UserRepository $userRepository,
        private  UserFactory $userFactory,
        private ManagerRegistry $doctrine,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $email = $io->ask(
            'email',
            null,
            function (?string $input) {
                Assert::email($input, 'Email is invalid');

                return $input;
            }
        );

        $password = $io->askHidden(
            'password',
            function (?string $input) {
                Assert::notEmpty($input, 'Password cannot be empty');

                return $input;
            }
        );
        $entityManager = $this->doctrine->getManager();
        $user = $this->userFactory->create($email, $password);
        //dd($user);
        $this->userRepository->add($user);
        //$entityManager->persist($this->userRepository);
        $entityManager->flush();

        return Command::SUCCESS;
    }
}