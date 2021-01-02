<?php

namespace App\Entity;

use App\Repository\PaymentCommissionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaymentCommissionRepository::class)
 * ORM\HasLifecycleCallbacks
 */
class PaymentCommission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Payment::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $payment;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2, nullable=true)
     */
    private $fixedCommission = 0;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2, nullable=true)
     */
    private $variableCommission = 0;

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

    public function getPayment(): ?Payment
    {
        return $this->payment;
    }

    public function setPayment(?Payment $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getFixedCommission(): ?string
    {
        return $this->fixedCommission;
    }

    public function setFixedCommission(?string $fixedCommission): self
    {
        $this->fixedCommission = $fixedCommission;

        return $this;
    }

    public function getVariableCommission(): ?string
    {
        return $this->variableCommission;
    }

    public function setVariableCommission(?string $variableCommission): self
    {
        $this->variableCommission = $variableCommission;

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
