<?php

namespace App\Entity;

use App\Repository\PriorityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PriorityRepository::class)]
class Priority
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column(length: 255)]
    private ?string $Tache = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Datetime = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $Created_at = null;

    #[ORM\Column]
    private ?bool $status = null;

    /**
     * @var Collection<int, Priority>
     */
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'priority')]
    private Collection $priorities;

    public function __construct()
    {
        $this->priorities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getTache(): ?string
    {
        return $this->Tache;
    }

    public function setTache(string $Tache): static
    {
        $this->Tache = $Tache;

        return $this;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->Datetime;
    }

    public function setDatetime(\DateTimeInterface $Datetime): static
    {
        $this->Datetime = $Datetime;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->Created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $Created_at): static
    {
        $this->Created_at = $Created_at;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Priority>
     */
    public function getPriorities(): Collection
    {
        return $this->priorities;
    }

    public function addPriority(self $priority): static
    {
        if (!$this->priorities->contains($priority)) {
            $this->priorities->add($priority);
            $priority->setPriority($this);
        }

        return $this;
    }

    public function removePriority(self $priority): static
    {
        if ($this->priorities->removeElement($priority)) {
            // set the owning side to null (unless already changed)
            if ($priority->getPriority() === $this) {
                $priority->setPriority(null);
            }
        }

        return $this;
    }
}
