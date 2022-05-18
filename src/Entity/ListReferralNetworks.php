<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ListReferralNetworksRepository;

/** A pakage. */
#[ApiResource]
#[ORM\Entity(repositoryClass: ListReferralNetworksRepository::class)]
class ListReferralNetworks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $referral_networks_id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $owner_id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $owner_name;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $pakege_id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $unique_code;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $network_code;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $client_code;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $profit_network;

    #[ORM\Column(type: 'float', nullable: true)]
    private $payments_direct;

    #[ORM\Column(type: 'float', nullable: true)]
    private $payments_cash;

    #[ORM\Column(type: 'float', nullable: true)]
    private $current_balance;

    #[ORM\Column(type: 'float', nullable: true)]
    private $system_revenues;

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

    public function getReferralNetworksId(): ?int
    {
        return $this->referral_networks_id;
    }

    public function setReferralNetworksId(?int $referral_networks_id): self
    {
        $this->referral_networks_id = $referral_networks_id;

        return $this;
    }

    public function getOwnerId(): ?int
    {
        return $this->owner_id;
    }

    public function setOwnerId(?int $owner_id): self
    {
        $this->owner_id = $owner_id;

        return $this;
    }

    public function getOwnerName(): ?string
    {
        return $this->owner_name;
    }

    public function setOwnerName(?string $owner_name): self
    {
        $this->owner_name = $owner_name;

        return $this;
    }

    public function getPakegeId(): ?int
    {
        return $this->pakege_id;
    }

    public function setPakegeId(?int $pakege_id): self
    {
        $this->pakege_id = $pakege_id;

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

    public function getNetworkCode(): ?string
    {
        return $this->network_code;
    }

    public function setNetworkCode(?string $network_code): self
    {
        $this->network_code = $network_code;

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

    public function getProfitNetwork(): ?int
    {
        return $this->profit_network;
    }

    public function setProfitNetwork(?int $profit_network): self
    {
        $this->profit_network = $profit_network;

        return $this;
    }

    public function getPaymentsDirect(): ?float
    {
        return $this->payments_direct;
    }

    public function setPaymentsDirect(?float $payments_direct): self
    {
        $this->payments_direct = $payments_direct;

        return $this;
    }

    public function getPaymentsCash(): ?float
    {
        return $this->payments_cash;
    }

    public function setPaymentsCash(?float $payments_cash): self
    {
        $this->payments_cash = $payments_cash;

        return $this;
    }

    public function getCurrentBalance(): ?float
    {
        return $this->current_balance;
    }

    public function setCurrentBalance(?float $current_balance): self
    {
        $this->current_balance = $current_balance;

        return $this;
    }

    public function getSystemRevenues(): ?float
    {
        return $this->system_revenues;
    }

    public function setSystemRevenues(?float $system_revenues): self
    {
        $this->system_revenues = $system_revenues;

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
