<?php

namespace App\Entity;

use App\Repository\ChecklistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChecklistRepository::class)
 */
class Checklist
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1200)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="Checklist")
     */
    private $checklist;

    public function __construct()
    {
        $this->checkListInfos = new ArrayCollection();
        $this->checklist = new ArrayCollection();
    }

    public function __toString(){
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getChecklist(): Collection
    {
        return $this->checklist;
    }

    public function addChecklist(User $checklist): self
    {
        if (!$this->checklist->contains($checklist)) {
            $this->checklist[] = $checklist;
            $checklist->setChecklist($this);
        }

        return $this;
    }

    public function removeChecklist(User $checklist): self
    {
        if ($this->checklist->removeElement($checklist)) {
            // set the owning side to null (unless already changed)
            if ($checklist->getChecklist() === $this) {
                $checklist->setChecklist(null);
            }
        }

        return $this;
    }

}
