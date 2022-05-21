<?php

declare(strict_types=1);

namespace App\Security;

use App\Entity\User;
use App\Security\UserPasswordHasherInterface;

class UserFactory
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function create(string $email, string $password): User
    {
        $user = new User($email);
        $user->setPassword($password, $this->passwordHasher);
//dd($user);
        return $user;
    }
}