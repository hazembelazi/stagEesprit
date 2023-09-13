<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity(repositoryClass: EtudiantRepository::class)]


class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    #[Assert\NotBlank(message: 'Le nom ne peut pas être vide')]
    #[Assert\Length(
        min: 3,
        minMessage: 'Le nom doit contenir au moins {{ limit }} caractères.'
    )]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le prénom ne peut pas être vide')]
    #[Assert\Length(
        min: 3,
        minMessage: 'Le prenom doit contenir au moins {{ limit }} caractères.'
    )]
    private ?string $prenom = null;

    #[ORM\Column(length: 40)]
    private ?string $identifiant = null;

    #[ORM\Column(length: 255)]
    private ?string $classeact = null;

    #[ORM\Column(length: 255)]
    private ?string $classd = null;

    #[ORM\Column(length: 255)]
    private ?string $departement = null;

    #[ORM\Column]
    #[Assert\Range(
        min: 0,
        max: 20,
        notInRangeMessage: 'La note doit être comprise entre {{ min }} et {{ max }}.'
    )]
    private ?float $notea = null;

    #[ORM\Column]
    #[Assert\Range(
        min: 0,
        max: 20,
        notInRangeMessage: 'La note doit être comprise entre {{ min }} et {{ max }}.'
    )]
    private ?float $noteb = null;

    #[ORM\Column]
    #[Assert\Range(
        min: 0,
        max: 20,
        notInRangeMessage: 'La note doit être comprise entre {{ min }} et {{ max }}.'
    )]
    private ?float $notec = null;

    #[ORM\Column]
    #[Assert\Range(
        min: 0,
        max: 2,
        notInRangeMessage: 'Le niveau A doit être compris entre {{ min }} et {{ max }}.'
    )]
    private ?float $niveauA = null;

    #[ORM\Column]
    #[Assert\Range(
        min: 0,
        max: 2,
        notInRangeMessage: 'Le niveau F doit être compris entre {{ min }} et {{ max }}.'
    )]
    private ?float $niveauF = null;

    #[ORM\Column]
    private ?float $score = null;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function setIdentifiant(string $identifiant): static
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    public function getClasseact(): ?string
    {
        return $this->classeact;
    }

    public function setClasseact(string $classeact): static
    {
        $this->classeact = $classeact;

        return $this;
    }

    public function getClassd(): ?string
    {
        return $this->classd;
    }

    public function setClassd(string $classd): static
    {
        $this->classd = $classd;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): static
    {
        $this->departement = $departement;

        return $this;
    }

    public function getNotea(): ?float
    {
        return $this->notea;
    }

    public function setNotea(float $notea): static
    {
        $this->notea = $notea;

        $this->score = $this->calculateScore(); // Calculate the score and update the property

        return $this;
    }

    public function getNoteb(): ?float
    {
        return $this->noteb;
    }

    public function setNoteb(float $noteb): static
    {
        $this->noteb = $noteb;

        $this->score = $this->calculateScore(); // Calculate the score and update the property

        return $this;
    }

    public function getNotec(): ?float
    {
        return $this->notec;
    }

    public function setNotec(float $notec): static
    {
        $this->notec = $notec;

        $this->score = $this->calculateScore(); // Calculate the score and update the property

        return $this;
    }

    public function getNiveauA(): ?float
    {
        return $this->niveauA;
    }

    public function setNiveauA(float $niveauA): static
    {
        $this->niveauA = $niveauA;
        $this->score = $this->calculateScore(); // Calculate the score and update the property

        return $this;
    }

    public function getNiveauF(): ?float
    {
        return $this->niveauF;
    }

    public function setNiveauF(float $niveauF): static
    {
        $this->niveauF = $niveauF;
        $this->score = $this->calculateScore(); // Calculate the score and update the property

        return $this;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(float $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function calculateScore(): ?float
    {
        if ($this->niveauF !== null && $this->niveauA !== null) {
            return $this->niveauF * 2 + $this->niveauA * 3 + $this->notec * 3 + $this->noteb * 2 + $this->notea;
        }

        return null;
    }
}


