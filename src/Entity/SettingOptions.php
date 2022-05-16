<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SettingOptionsRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SettingOptionsRepository::class)]
/** Setting options. */
#[ApiResource]
class SettingOptions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Assert\NotNull]
    private $payments_singleline;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Assert\NotNull]
    private $payments_direct;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $cash_back;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $all_price_pakage;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $accrual_limit;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $system_revenues;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $update_day;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $limit_wallet_from_line;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $payments_direct_fast;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $multi_pakage_day;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $name_multi_pakage;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $created_at;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $updated_at;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $start_day;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $privileget_members;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $fast_start;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaymentsSingleline(): ?int
    {
        return $this->payments_singleline;
    }

    public function setPaymentsSingleline(?int $payments_singleline): self
    {
        $this->payments_singleline = $payments_singleline;

        return $this;
    }

    public function getPaymentsDirect(): ?int
    {
        return $this->payments_direct;
    }

    public function setPaymentsDirect(?int $payments_direct): self
    {
        $this->payments_direct = $payments_direct;

        return $this;
    }

    public function getCashBack(): ?int
    {
        return $this->cash_back;
    }

    public function setCashBack(?int $cash_back): self
    {
        $this->cash_back = $cash_back;

        return $this;
    }

    public function getAllPricePakage(): ?int
    {
        return $this->all_price_pakage;
    }

    public function setAllPricePakage(?int $all_price_pakage): self
    {
        $this->all_price_pakage = $all_price_pakage;

        return $this;
    }

    public function getAccrualLimit(): ?int
    {
        return $this->accrual_limit;
    }

    public function setAccrualLimit(?int $accrual_limit): self
    {
        $this->accrual_limit = $accrual_limit;

        return $this;
    }

    public function getSystemRevenues(): ?int
    {
        return $this->system_revenues;
    }

    public function setSystemRevenues(?int $system_revenues): self
    {
        $this->system_revenues = $system_revenues;

        return $this;
    }


    public function getUpdateDay(): ?int
    {
        return $this->update_day;
    }

    public function setUpdateDay(?int $update_day): self
    {
        $this->update_day = $update_day;

        return $this;
    }

    public function getLimitWalletFromLine(): ?int
    {
        return $this->limit_wallet_from_line;
    }

    public function setLimitWalletFromLine(?int $limit_wallet_from_line): self
    {
        $this->limit_wallet_from_line = $limit_wallet_from_line;

        return $this;
    }

    public function getPaymentsDirectFast(): ?int
    {
        return $this->payments_direct_fast;
    }

    public function setPaymentsDirectFast(?int $payments_direct_fast): self
    {
        $this->payments_direct_fast = $payments_direct_fast;

        return $this;
    }

    public function getMultiPakageDay(): ?\DateTimeInterface
    {
        return $this->multi_pakage_day;
    }

    public function setMultiPakageDay(?\DateTimeInterface $multi_pakage_day): self
    {
        $this->multi_pakage_day = $multi_pakage_day;

        return $this;
    }

    public function getNameMultiPakage(): ?string
    {
        return $this->name_multi_pakage;
    }

    public function setNameMultiPakage(?string $name_multi_pakage): self
    {
        $this->name_multi_pakage = $name_multi_pakage;

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

    public function getStartDay(): ?int
    {
        return $this->start_day;
    }

    public function setStartDay(?int $start_day): self
    {
        $this->start_day = $start_day;

        return $this;
    }

    public function getPrivilegetMembers(): ?int
    {
        return $this->privileget_members;
    }

    public function setPrivilegetMembers(?int $privileget_members): self
    {
        $this->privileget_members = $privileget_members;

        return $this;
    }

    public function getFastStart(): ?\DateTimeInterface
    {
        return $this->fast_start;
    }

    public function setFastStart(?\DateTimeInterface $fast_start): self
    {
        $this->fast_start = $fast_start;

        return $this;
    }

}
