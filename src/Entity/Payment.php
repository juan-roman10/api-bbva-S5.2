<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaymentRepository::class)
 * ORM\HasLifecycleCallbacks
 */
class Payment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $externalId;

    /**
     * @ORM\ManyToOne(targetEntity=Debt::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $debt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $paymentDate;

    /**
     * @ORM\ManyToOne(targetEntity=PaymentStatus::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $paymentStatus;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2)
     */
    private $amount;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $processDate;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;

    /**
     * @ORM\OneToOne(targetEntity=PaymentCommission::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $paymentCommission;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $modificationDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExternalId(): ?int
    {
        return $this->externalId;
    }

    public function setExternalId(int $externalId): self
    {
        $this->externalId = $externalId;

        return $this;
    }

    public function getDebt(): ?Debt
    {
        return $this->debt;
    }

    public function setDebt(?Debt $debt): self
    {
        $this->debt = $debt;

        return $this;
    }

    public function getPaymentDate(): ?\DateTimeInterface
    {
        return $this->paymentDate;
    }

    public function setPaymentDate(\DateTimeInterface $paymentDate): self
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }

    public function getPaymentStatus(): ?PaymentStatus
    {
        return $this->paymentStatus;
    }

    public function setPaymentStatus(?PaymentStatus $paymentStatus): self
    {
        $this->paymentStatus = $paymentStatus;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getProcessDate(): ?\DateTimeInterface
    {
        return $this->processDate;
    }

    public function setProcessDate(?\DateTimeInterface $processDate): self
    {
        $this->processDate = $processDate;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getPaymentCommission(): ?PaymentCommission
    {
        return $this->paymentCommission;
    }

    public function setPaymentCommission(?PaymentCommission $paymentCommission): self
    {
        $this->paymentCommission = $paymentCommission;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getModificationDate(): ?\DateTimeInterface
    {
        return $this->modificationDate;
    }

    public function setModificationDate(\DateTimeInterface $modificationDate): self
    {
        $this->modificationDate = $modificationDate;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist() {
        if ($this->active === null){
            $this->setActive(true);           
            }           
        $this->active = (bool) $this->active;
        $this->creationDate = new \DateTime('now');
        $this->modificationDate = new \DateTime('now');
    }
    
    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate() {
        $this->active = (bool) $this->active;
        $this->modificationDate = new \DateTime('now');
    }
}
