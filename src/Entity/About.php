<?php

namespace App\Entity;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Repository\AboutRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AboutRepository::class)]
#[Vich\Uploadable]
class About
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cv = null;

   #[Vich\UploadableField(mapping: 'cv_file', fileNameProperty: 'cv')]
    private ?File $cvFile = null;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titleEn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $titleFr = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(?string $cv): static
    {
        $this->cv = $cv;

        return $this;
    }

    public function setCvFile(?File $cvFile): void
    {
        $this->cvFile = $cvFile;

        if (null !== $cvFile) {
            // Met à jour updatedAt pour forcer Doctrine à persister l'entité
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getCvFile(): ?File
    {
        return $this->cvFile;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
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
            'en' => $this->titleEn,
            'fr' => $this->titleFr,
            default => $this->title,
        };
    }
    public function getTranslatedDescription(string $locale): ?string
    {
        return match ($locale) {
            'en' => $this->descriptionEn,
            'fr' => $this->descriptionFr,
            default => $this->description,
        };
    }
}
