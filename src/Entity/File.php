<?php

namespace App\Entity;

use App\Repository\FileRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FileRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class File
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fullName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fileName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fileSystemIdentifier;

    /**
     * @ORM\Column(type="datetime")
     */
    private $generationDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $uploadDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $totalRecords;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=2)
     */
    private $totalAmount;

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

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getFileSystemIdentifier(): ?string
    {
        return $this->fileSystemIdentifier;
    }

    public function setFileSystemIdentifier(string $fileSystemIdentifier): self
    {
        $this->fileSystemIdentifier = $fileSystemIdentifier;

        return $this;
    }

    public function getGenerationDate(): ?\DateTimeInterface
    {
        return $this->generationDate;
    }

    public function setGenerationDate(\DateTimeInterface $generationDate): self
    {
        $this->generationDate = $generationDate;

        return $this;
    }

    public function getUploadDate(): ?\DateTimeInterface
    {
        return $this->uploadDate;
    }

    public function setUploadDate(\DateTimeInterface $uploadDate): self
    {
        $this->uploadDate = $uploadDate;

        return $this;
    }

    public function getTotalRecords(): ?int
    {
        return $this->totalRecords;
    }

    public function setTotalRecords(int $totalRecords): self
    {
        $this->totalRecords = $totalRecords;

        return $this;
    }

    public function getTotalAmount(): ?string
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(string $totalAmount): self
    {
        $this->totalAmount = $totalAmount;

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
