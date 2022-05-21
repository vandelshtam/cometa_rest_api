<?php

declare(strict_types=1);

namespace App\Security;

interface UserFetcherInterface
{
    public function getAuthUser(): AuthUserInterface;
}