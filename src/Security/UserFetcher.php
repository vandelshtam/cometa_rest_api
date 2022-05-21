<?php

declare(strict_types=1);

namespace App\Security;

use Webmozart\Assert\Assert;
use App\Security\AuthUserInterface;
use App\Security\UserFetcherInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/api/login', name: 'app_api_login', methods: ['POST'])]
class UserFetcher implements UserFetcherInterface
{
    public function __construct(private Security $security)
    {
    }

    public function getAuthUser(): AuthUserInterface
    {
        /** @var AuthUserInterface $user */
        $user = $this->security->getUser();

        Assert::notNull($user, 'Current user not found check security access list');
        Assert::isInstanceOf($user, AuthUserInterface::class, sprintf('Invalid user type %s', \get_class($user)));

        return $user;
    }
}