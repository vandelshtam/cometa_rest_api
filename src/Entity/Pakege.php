<?php

namespace App\Entity;

//use Webmozart\Assert\Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PakegeRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/** A pakage. */
#[ApiResource]
#[ORM\Entity(repositoryClass: PakegeRepository::class)]
class Pakege
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name;

    #[ORM\Column(type: 'integer', nullable: false)]
    #[Assert\NotNull]
    private $user_id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $price;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $referral_networks_id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $client_code;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $token;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $activation;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $unique_code;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $referral_link;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $action;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $created_at;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $updated_at;

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

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(?int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getReferralNetworksId(): ?string
    {
        return $this->referral_networks_id;
    }

    public function setReferralNetworksId(?string $referral_networks_id): self
    {
        $this->referral_networks_id = $referral_networks_id;

        return $this;
    }

    public function getClientCode(): ?string
    {
        return $this->client_code;
    }

    public function setClientCode(?string $client_code): self
    {
        $this->client_code = $client_code;

        return $this;
    }

    public function getToken(): ?int
    {
        return $this->token;
    }

    public function setToken(?int $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getActivation(): ?string
    {
        return $this->activation;
    }

    public function setActivation(?string $activation): self
    {
        $this->activation = $activation;

        return $this;
    }

    public function getUniqueCode(): ?string
    {
        return $this->unique_code;
    }

    public function setUniqueCode(?string $unique_code): self
    {
        $this->unique_code = $unique_code;

        return $this;
    }

    public function getReferralLink(): ?string
    {
        return $this->referral_link;
    }

    public function setReferralLink(?string $referral_link): self
    {
        $this->referral_link = $referral_link;

        return $this;
    }

    public function getAction(): ?int
    {
        return $this->action;
    }

    public function setAction(?int $action): self
    {
        $this->action = $action;

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
}
