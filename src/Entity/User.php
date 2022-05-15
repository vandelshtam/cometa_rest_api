<?php

namespace App\Entity;

//use Webmozart\Assert\Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/** A user. */
#[ApiResource]
#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
     /** The id of this user. */
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    //#[UniqueEntity(fields: ['email'], message: 'Nest message')]
    #[Assert\NotBlank]
     /** The id of this email. */
    private $email;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
     /** The id of this referal_link. */
    private $referral_link;

    #[ORM\Column(type: 'json', nullable: true)]
    private $roles = [];

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $password;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $personal_data_id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $username;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pesonal_code;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $secret_code;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $locale;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $created_at;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $updated_at;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Pakege::class)]
    private $pakeges;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $pakage_status;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $pakage_id;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $multi_pakage;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $user_id;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

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

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(?array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function __toString()
    {
      return $this->getId();
    }

    public function getPesonalCode(): ?string
    {
        return $this->pesonal_code;
    }

    public function setPesonalCode(?string $pesonal_code): self
    {
        $this->pesonal_code = $pesonal_code;

        return $this;
    }

    public function getSecretCode(): ?string
    {
        return $this->secret_code;
    }

    public function setSecretCode(?string $secret_code): self
    {
        $this->secret_code = $secret_code;

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(?string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getPakageStatus(): ?int
    {
        return $this->pakage_status;
    }

    public function setPakageStatus(?int $pakage_status): self
    {
        $this->pakage_status = $pakage_status;

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

    // public function addPakege(Pakege $pakege): self
    // {
    //     if (!$this->pakeges->contains($pakege)) {
    //         $this->pakeges[] = $pakege;
    //         $pakege->setUser($this);
    //     }

    //     return $this;
    // }

    // public function removePakege(Pakege $pakege): self
    // {
    //     if ($this->pakeges->removeElement($pakege)) {
    //         // set the owning side to null (unless already changed)
    //         if ($pakege->getUser() === $this) {
    //             $pakege->setUser(null);
    //         }
    //     }

    //     return $this;
    // }

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

    public function getMultiPakage(): ?int
    {
        return $this->multi_pakage;
    }

    public function setMultiPakage(?int $multi_pakage): self
    {
        $this->multi_pakage = $multi_pakage;

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
}
