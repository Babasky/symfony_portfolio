<?php

namespace App\Entity;

use App\Repository\ParcoursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParcoursRepository::class)]
class Parcours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $sub_title = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titleEn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titleFr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $subTitleEn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $subTitleFr = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descriptionEn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descriptionFr = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getSubTitle(): ?string
    {
        return $this->sub_title;
    }

    public function setSubTitle(string $sub_title): static
    {
        $this->sub_title = $sub_title;

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

    public function getTitleEn(): ?string
    {
        return $this->titleEn;
    }

    public function setTitleEn(?string $titleEn): static
    {
        $this->titleEn = $titleEn;

        return $this;
    }

    public function getTitleFr(): ?string
    {
        return $this->titleFr;
    }

    public function setTitleFr(?string $titleFr): static
    {
        $this->titleFr = $titleFr;

        return $this;
    }

    public function getSubTitleEn(): ?string
    {
        return $this->subTitleEn;
    }

    public function setSubTitleEn(?string $subTitleEn): static
    {
        $this->subTitleEn = $subTitleEn;

        return $this;
    }

    public function getSubTitleFr(): ?string
    {
        return $this->subTitleFr;
    }

    public function setSubTitleFr(?string $subTitleFr): static
    {
        $this->subTitleFr = $subTitleFr;

        return $this;
    }

    public function getDescriptionEn(): ?string
    {
        return $this->descriptionEn;
    }

    public function setDescriptionEn(?string $descriptionEn): static
    {
        $this->descriptionEn = $descriptionEn;

        return $this;
    }

    public function getDescriptionFr(): ?string
    {
        return $this->descriptionFr;
    }

    public function setDescriptionFr(?string $descriptionFr): static
    {
        $this->descriptionFr = $descriptionFr;

        return $this;
    }

    public function getTranslatedTitle(string $locale): ?string
    {
        return match ($locale) {
            'en' => $this->getTitleEn(),
            'fr' => $this->getTitleFr(),
            default => $this->getTitle(),
        };
    }
    public function getTranslatedSubTitle(string $locale): ?string
    {
        return match ($locale) {
            'en' => $this->getSubTitleEn(),
            'fr' => $this->getSubTitleFr(),
            default => $this->getSubTitle(),
        };
    }

    public function getTranslatedDescription(string $locale): ?string
    {
        return match ($locale) {
            'en' => $this->getDescriptionEn(),
            'fr' => $this->getDescriptionFr(),
            default => $this->getDescription(),
        };
    }
}
