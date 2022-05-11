<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;


/** A review of a book. */
#[ApiResource]
#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]

     /** The id of this review. */
     private ?int $id = null;

    
    // private $id;

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }
}
