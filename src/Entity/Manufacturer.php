<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
//use App\Repository\ManufacturerRepository;
//use Doctrine\ORM\Mapping as ORM;

//#[ORM\Entity(repositoryClass: ManufacturerRepository::class)]
/** A manufacturer */
#[ApiResource]
class Manufacturer
{
    //#[ORM\Id]
    //#[ORM\GeneratedValue]
    //#[ORM\Column(type: 'integer')]
    private ?int $id = NULL;

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }
}
