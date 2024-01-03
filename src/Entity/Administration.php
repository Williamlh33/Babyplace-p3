<?php

namespace App\Entity;

use App\Repository\AdministrationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\DBAL\Types\Types;
use DateTimeInterface;
use DateTime;

#[ORM\Entity(repositoryClass: AdministrationRepository::class)]
#[Vich\Uploadable]
class Administration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $familyIncome;

    #[Vich\UploadableField(mapping: 'family_income_file', fileNameProperty:'familyIncome')]
    private ?File $familyIncomeFile = null;

    #[ORM\Column(length: 255)]
    private string $taxReturn;

    #[Vich\UploadableField(mapping: 'tax_return_file', fileNameProperty:'taxReturn')]
    private ?File $taxReturnFile = null;

    #[ORM\Column(length: 7)]
    #[Assert\EqualTo(
        value: 7,
    )]
    private string $cafNumber;

    #[ORM\Column(length: 15)]
    #[Assert\EqualTo(
        value: 15,
    )]
    private string $socialNumber;

    #[ORM\Column(length: 255)]
    private string $residencyProof;

    #[Vich\UploadableField(mapping: 'residency_proof_file', fileNameProperty:'residencyProof')]
    private ?File $residencyProofFile = null;

    #[ORM\Column(length: 255)]
    private string $statusProof;

    #[Vich\UploadableField(mapping: 'status_proof_file', fileNameProperty:'statusProof')]
    private ?File $statusProofFile = null;

    #[ORM\Column(length: 255)]
    private string $bankingInfo;

    #[ORM\Column(length: 255)]
    private string $discharge;

    #[Vich\UploadableField(mapping: 'discharge_file', fileNameProperty:'discharge')]
    private ?File $dischargeFile = null;

    #[ORM\Column(length: 255)]
    private string $familyRecord;

    #[Vich\UploadableField(mapping: 'family_record_file', fileNameProperty:'familyRecord')]
    private ?File $familyRecordFile = null;

    #[ORM\Column(length: 255)]
    private ?string $divorceDecree = null;

    #[Vich\UploadableField(mapping: 'divorce_decree_file', fileNameProperty:'divorceDecree')]
    private ?File $divorceDecreeFile = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DatetimeInterface $updatedAt = null;

    #[ORM\OneToOne(inversedBy: 'administration', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Family $parent = null;

    #[ORM\ManyToMany(targetEntity: Creche::class, inversedBy: 'administrations')]
    private Collection $creche;

    public function __construct()
    {
        $this->creche = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFamilyIncome(): ?string
    {
        return $this->familyIncome;
    }

    public function setFamilyIncome(string $familyIncome): static
    {
        $this->familyIncome = $familyIncome;

        return $this;
    }

    public function getFamilyIncomeFile(): ?File
    {
        return $this->familyIncomeFile;
    }

    public function setFamilyIncomeFile(File $image = null): Administration
    {
        $this-> familyIncomeFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }

        return $this;
    }

    public function getTaxReturn(): ?string
    {
        return $this->taxReturn;
    }

    public function setTaxReturn(string $taxReturn): static
    {
        $this->taxReturn = $taxReturn;

        return $this;
    }

    public function getTaxReturnFile(): ?File
    {
        return $this->taxReturnFile;
    }

    public function setTaxReturnFile(File $image = null): Administration
    {
        $this-> taxReturnFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }

        return $this;
    }

    public function getCafNumber(): ?string
    {
        return $this->cafNumber;
    }

    public function setCafNumber(string $cafNumber): static
    {
        $this->cafNumber = $cafNumber;

        return $this;
    }

    public function getSocialNumber(): ?string
    {
        return $this->socialNumber;
    }

    public function setSocialNumber(string $socialNumber): static
    {
        $this->socialNumber = $socialNumber;

        return $this;
    }

    public function getResidencyProof(): ?string
    {
        return $this->residencyProof;
    }

    public function setResidencyProof(string $residencyProof): static
    {
        $this->residencyProof = $residencyProof;

        return $this;
    }

    public function getResidencyProofFile(): ?File
    {
        return $this->residencyProofFile;
    }

    public function setResidencyProofFile(File $image = null): Administration
    {
        $this-> residencyProofFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }

        return $this;
    }

    public function getStatusProof(): ?string
    {
        return $this->statusProof;
    }

    public function setStatusProof(string $statusProof): static
    {
        $this->statusProof = $statusProof;

        return $this;
    }

    public function getStatusProofFile(): ?File
    {
        return $this->statusProofFile;
    }

    public function setStatusProofFile(File $image = null): Administration
    {
        $this-> statusProofFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }

        return $this;
    }

    public function getBankingInfo(): ?string
    {
        return $this->bankingInfo;
    }

    public function setBankingInfo(string $bankingInfo): static
    {
        $this->bankingInfo = $bankingInfo;

        return $this;
    }

    public function getDischarge(): ?string
    {
        return $this->discharge;
    }

    public function setDischarge(string $discharge): static
    {
        $this->discharge = $discharge;

        return $this;
    }

    public function getDischargeFile(): ?File
    {
        return $this->dischargeFile;
    }

    public function setDischargeFile(File $image = null): Administration
    {
        $this-> dischargeFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }

        return $this;
    }

    public function getFamilyRecord(): ?string
    {
        return $this->familyRecord;
    }

    public function setFamilyRecord(string $familyRecord): static
    {
        $this->familyRecord = $familyRecord;

        return $this;
    }

    public function getFamilyRecordFile(): ?File
    {
        return $this->familyRecordFile;
    }

    public function setFamilyRecordFile(File $image = null): Administration
    {
        $this-> familyRecordFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }

        return $this;
    }

    public function getDivorceDecree(): ?string
    {
        return $this->divorceDecree;
    }

    public function setDivorceDecree(string $divorceDecree): static
    {
        $this->divorceDecree = $divorceDecree;

        return $this;
    }

    public function getDivorceDecreeFile(): ?File
    {
        return $this->divorceDecreeFile;
    }

    public function setDivorceDecreeFile(File $image = null): Administration
    {
        $this-> divorceDecreeFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }

        return $this;
    }

    public function getParent(): ?Family
    {
        return $this->parent;
    }

    public function setParent(Family $parent): static
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection<int, Creche>
     */
    public function getCreche(): Collection
    {
        return $this->creche;
    }

    public function addCreche(Creche $creche): static
    {
        if (!$this->creche->contains($creche)) {
            $this->creche->add($creche);
        }

        return $this;
    }

    public function removeCreche(Creche $creche): static
    {
        $this->creche->removeElement($creche);

        return $this;
    }
}
