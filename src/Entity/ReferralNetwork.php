<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ReferralNetworkRepository;


/** A ReferralNetwork. */
#[ApiResource]
#[ORM\Entity(repositoryClass: ReferralNetworkRepository::class)]
class ReferralNetwork
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $user_id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $user_status;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $personal_data_id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $balance;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $network_code;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $member_code;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $pakege_id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $network_id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $user_referral_id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $network_referral_id;

    #[ORM\Column(type: 'float', nullable: true)]
    private $reward;

    #[ORM\Column(type: 'float', nullable: true)]
    private $koef;

    #[ORM\Column(type: 'float', nullable: true)]
    private $cash;

    #[ORM\Column(type: 'float', nullable: true)]
    private $direct;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $my_team;

    #[ORM\Column(type: 'float', nullable: true)]
    private $current_network_profit;

    #[ORM\Column(type: 'float', nullable: true)]
    private $payments_network;

    #[ORM\Column(type: 'float', nullable: true)]
    private $payments_cash;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $pakage;

    #[ORM\Column(type: 'float', nullable: true)]
    private $reward_wallet;

    #[ORM\Column(type: 'float', nullable: true)]
    private $withdrawal_to_wallet;

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

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(?int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getUserStatus(): ?string
    {
        return $this->user_status;
    }

    public function setUserStatus(?string $user_status): self
    {
        $this->user_status = $user_status;

        return $this;
    }

    public function getPersonalDataId(): ?int
    {
        return $this->personal_data_id;
    }

    public function setPersonalDataId(?int $personal_data_id): self
    {
        $this->personal_data_id = $personal_data_id;

        return $this;
    }

    public function getBalance(): ?int
    {
        return $this->balance;
    }

    public function setBalance(?int $balance): self
    {
        $this->balance = $balance;

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

    public function getMemberCode(): ?string
    {
        return $this->member_code;
    }

    public function setMemberCode(?string $member_code): self
    {
        $this->member_code = $member_code;

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

    public function getNetworkId(): ?int
    {
        return $this->network_id;
    }

    public function setNetworkId(?int $network_id): self
    {
        $this->network_id = $network_id;

        return $this;
    }

    public function getUserReferralId(): ?int
    {
        return $this->user_referral_id;
    }

    public function setUserReferralId(?int $user_referral_id): self
    {
        $this->user_referral_id = $user_referral_id;

        return $this;
    }

    public function getNetworkReferralId(): ?int
    {
        return $this->network_referral_id;
    }

    public function setNetworkReferralId(?int $network_referral_id): self
    {
        $this->network_referral_id = $network_referral_id;

        return $this;
    }

    public function getReward(): ?float
    {
        return $this->reward;
    }

    public function setReward(?float $reward): self
    {
        $this->reward = $reward;

        return $this;
    }

    public function getKoef(): ?float
    {
        return $this->koef;
    }

    public function setKoef(?float $koef): self
    {
        $this->koef = $koef;

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

    public function getMyTeam(): ?string
    {
        return $this->my_team;
    }

    public function setMyTeam(?string $my_team): self
    {
        $this->my_team = $my_team;

        return $this;
    }

    public function getCurrentNetworkProfit(): ?float
    {
        return $this->current_network_profit;
    }

    public function setCurrentNetworkProfit(?float $current_network_profit): self
    {
        $this->current_network_profit = $current_network_profit;

        return $this;
    }

    public function getPaymentsNetwork(): ?float
    {
        return $this->payments_network;
    }

    public function setPaymentsNetwork(?float $payments_network): self
    {
        $this->payments_network = $payments_network;

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

    public function getPakage(): ?int
    {
        return $this->pakage;
    }

    public function setPakage(?int $pakage): self
    {
        $this->pakage = $pakage;

        return $this;
    }

    public function getRewardWallet(): ?float
    {
        return $this->reward_wallet;
    }

    public function setRewardWallet(?float $reward_wallet): self
    {
        $this->reward_wallet = $reward_wallet;

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
