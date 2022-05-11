<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BookRepository;
use Doctrine\ORM\Mapping as ORM;


/** A book. */
#[ApiResource]
#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    

   /** The id of this book. */
   private ?int $id = null;


    // private $id;

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }
}
