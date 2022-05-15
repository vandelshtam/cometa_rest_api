<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TablePakageRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ORM\Entity(repositoryClass: TablePakageRepository::class)]
/** Table pakages. */
#[ApiResource]
class TablePakage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank]
    private $name;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Assert\NotNull]
    private $price_pakage;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $created_at;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $updated_at;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank]
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPricePakage(): ?int
    {
        return $this->price_pakage;
    }

    public function setPricePakage(?int $price_pakage): self
    {
        $this->price_pakage = $price_pakage;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(?\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
