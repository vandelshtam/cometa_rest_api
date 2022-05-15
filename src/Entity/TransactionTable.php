<?php

namespace App\Entity;

use App\Repository\TransactionTableRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransactionTableRepository::class)]
class TransactionTable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $network_id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $user_id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $pakage_id;

    #[ORM\Column(type: 'float', nullable: true)]
    private $cash;

    #[ORM\Column(type: 'float', nullable: true)]
    private $direct;

    #[ORM\Column(type: 'float', nullable: true)]
    private $withdrawal_to_wallet;

    #[ORM\Column(type: 'float', nullable: true)]
    private $withdrawal;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $application_withdrawal;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $application_withdrawal_status;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $network_activation_id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $type;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $pakage_price;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $wallet_id;

    #[ORM\Column(type: 'float', nullable: true)]
    private $somme;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $token;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $created_at;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNetworkId(): ?int
    {
        return $this->network_id;
    }

    public function setNetworkId(?int $network_id): self
    {
        $this->network_id = $network_id;

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

    public function getPakageId(): ?int
    {
        return $this->pakage_id;
    }

    public function setPakageId(?int $pakage_id): self
    {
        $this->pakage_id = $pakage_id;

        return $this;
    }

    public function getCash(): ?float
    {
        return $this->cash;
    }

    public function setCash(?float $cash): self
    {
        $this->cash = $cash;

        return $this;
    }

    public function getDirect(): ?float
    {
        return $this->direct;
    }

    public function setDirect(?float $direct): self
    {
        $this->direct = $direct;

        return $this;
    }

    public function getWithdrawalToWallet(): ?float
    {
        return $this->withdrawal_to_wallet;
    }

    public function setWithdrawalToWallet(?float $withdrawal_to_wallet): self
    {
        $this->withdrawal_to_wallet = $withdrawal_to_wallet;

        return $this;
    }

    public function getWithdrawal(): ?float
    {
        return $this->withdrawal;
    }

    public function setWithdrawal(?float $withdrawal): self
    {
        $this->withdrawal = $withdrawal;

        return $this;
    }

    public function getApplicationWithdrawal(): ?int
    {
        return $this->application_withdrawal;
    }

    public function setApplicationWithdrawal(?int $application_withdrawal): self
    {
        $this->application_withdrawal = $application_withdrawal;

        return $this;
    }

    public function getApplicationWithdrawalStatus(): ?int
    {
        return $this->application_withdrawal_status;
    }

    public function setApplicationWithdrawalStatus(?int $application_withdrawal_status): self
    {
        $this->application_withdrawal_status = $application_withdrawal_status;

        return $this;
    }

    public function getNetworkActivationId(): ?int
    {
        return $this->network_activation_id;
    }

    public function setNetworkActivationId(?int $network_activation_id): self
    {
        $this->network_activation_id = $network_activation_id;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPakagePrice(): ?int
    {
        return $this->pakage_price;
    }

    public function setPakagePrice(?int $pakage_price): self
    {
        $this->pakage_price = $pakage_price;

        return $this;
    }

    public function getWalletId(): ?int
    {
        return $this->wallet_id;
    }

    public function setWalletId(?int $wallet_id): self
    {
        $this->wallet_id = $wallet_id;

        return $this;
    }

    public function getSomme(): ?float
    {
        return $this->somme;
    }

    public function setSomme(?float $somme): self
    {
        $this->somme = $somme;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

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
