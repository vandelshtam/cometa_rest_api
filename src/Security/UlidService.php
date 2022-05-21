<?php

declare(strict_types=1);

namespace App\Security;

use Symfony\Component\Uid\Ulid;
//use Symfony\Component\Validator\Constraints\Ulid;

/**
 * Universally Unique Lexicographically Sortable Identifier.
 *
 * @see https://github.com/ulid/spec
 */
class UlidService
{
    public static function generate(): string
    {
        return Ulid::generate();
    }
}