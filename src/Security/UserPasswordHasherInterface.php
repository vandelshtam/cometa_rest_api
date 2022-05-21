<?php

declare(strict_types=1);

namespace App\Security;

use App\Entity\User;

interface UserPasswordHasherInterface
{
    public function hash(User $user, string $password): string;
}