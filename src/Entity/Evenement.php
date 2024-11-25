<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_event = null;

    #[ORM\ManyToOne(inversedBy: 'Evenement')]
    private ?Administrateur $administrateur = null;

    /**
     * @var Collection<int, TypeEvent>
     */
    #[ORM\OneToMany(targetEntity: TypeEvent::class, mappedBy: 'evenement')]
    private Collection $TypeEvent;

    /**
     * @var Collection<int, CategorieEvent>
     */
    #[ORM\OneToMany(targetEntity: CategorieEvent::class, mappedBy: 'evenement')]
    private Collection $CategorieEvent;

    public function __construct()
    {
        $this->TypeEvent = new ArrayCollection();
        $this->CategorieEvent = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDateEvent(): ?\DateTimeInterface
    {
        return $this->date_event;
    }

    public function setDateEvent(\DateTimeInterface $date_event): static
    {
        $this->date_event = $date_event;

        return $this;
    }

    public function getAdministrateur(): ?Administrateur
    {
        return $this->administrateur;
    }

    public function setAdministrateur(?Administrateur $administrateur): static
    {
        $this->administrateur = $administrateur;

        return $this;
    }

    /**
     * @return Collection<int, TypeEvent>
     */
    public function getTypeEvent(): Collection
    {
        return $this->TypeEvent;
    }

    public function addTypeEvent(TypeEvent $typeEvent): static
    {
        if (!$this->TypeEvent->contains($typeEvent)) {
            $this->TypeEvent->add($typeEvent);
            $typeEvent->setEvenement($this);
        }

        return $this;
    }

    public function removeTypeEvent(TypeEvent $typeEvent): static
    {
        if ($this->TypeEvent->removeElement($typeEvent)) {
            // set the owning side to null (unless already changed)
            if ($typeEvent->getEvenement() === $this) {
                $typeEvent->setEvenement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CategorieEvent>
     */
    public function getCategorieEvent(): Collection
    {
        return $this->CategorieEvent;
    }

    public function addCategorieEvent(CategorieEvent $categorieEvent): static
    {
        if (!$this->CategorieEvent->contains($categorieEvent)) {
            $this->CategorieEvent->add($categorieEvent);
            $categorieEvent->setEvenement($this);
        }

        return $this;
    }

    public function removeCategorieEvent(CategorieEvent $categorieEvent): static
    {
        if ($this->CategorieEvent->removeElement($categorieEvent)) {
            // set the owning side to null (unless already changed)
            if ($categorieEvent->getEvenement() === $this) {
                $categorieEvent->setEvenement(null);
            }
        }

        return $this;
    }
}
