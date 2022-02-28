<?php

namespace App\Entity;

use App\Repository\LockupTemplatesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LockupTemplatesRepository::class)]
class LockupTemplates
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100, nullable: true)]
    private $name;

    #[ORM\Column(type: 'string', length: 20)]
    private $style;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\Column(type: 'text', nullable: true)]
    private $svg;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $org_first_line;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $org_second_line;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $subject_first_line;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $subject_second_line;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $acronym_first_line;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $acronym_second_line;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $acronym_subject;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $description;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $links_to;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $extension;

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

    public function getStyle(): ?string
    {
        return $this->style;
    }

    public function setStyle(string $style): self
    {
        $this->style = $style;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getSvg(): ?string
    {
        return $this->svg;
    }

    public function setSvg(?string $svg): self
    {
        $this->svg = $svg;

        return $this;
    }

    public function getOrgFirstLine(): ?int
    {
        return $this->org_first_line;
    }

    public function setOrgFirstLine(?int $org_first_line): self
    {
        $this->org_first_line = $org_first_line;

        return $this;
    }

    public function getOrgSecondLine(): ?int
    {
        return $this->org_second_line;
    }

    public function setOrgSecondLine(?int $org_second_line): self
    {
        $this->org_second_line = $org_second_line;

        return $this;
    }

    public function getSubjectFirstLine(): ?int
    {
        return $this->subject_first_line;
    }

    public function setSubjectFirstLine(?int $subject_first_line): self
    {
        $this->subject_first_line = $subject_first_line;

        return $this;
    }

    public function getSubjectSecondLine(): ?int
    {
        return $this->subject_second_line;
    }

    public function setSubjectSecondLine(?int $subject_second_line): self
    {
        $this->subject_second_line = $subject_second_line;

        return $this;
    }

    public function getAcronymFirstLine(): ?int
    {
        return $this->acronym_first_line;
    }

    public function setAcronymFirstLine(?int $acronym_first_line): self
    {
        $this->acronym_first_line = $acronym_first_line;

        return $this;
    }

    public function getAcronymSecondLine(): ?int
    {
        return $this->acronym_second_line;
    }

    public function setAcronymSecondLine(?int $acronym_second_line): self
    {
        $this->acronym_second_line = $acronym_second_line;

        return $this;
    }

    public function getAcronymSubject(): ?int
    {
        return $this->acronym_subject;
    }

    public function setAcronymSubject(?int $acronym_subject): self
    {
        $this->acronym_subject = $acronym_subject;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLinksTo(): ?int
    {
        return $this->links_to;
    }

    public function setLinksTo(?int $links_to): self
    {
        $this->links_to = $links_to;

        return $this;
    }

    public function getExtension(): ?int
    {
        return $this->extension;
    }

    public function setExtension(?int $extension): self
    {
        $this->extension = $extension;

        return $this;
    }
}
