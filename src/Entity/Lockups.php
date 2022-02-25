<?php

namespace App\Entity;

use App\Repository\LockupsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LockupsRepository::class)]
class Lockups
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $template_id;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $org_first_line;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $org_second_line;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $subject_first_line;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $subject_second_line;

    #[ORM\Column(type: 'integer')]
    private $approver;

    #[ORM\Column(type: 'integer')]
    private $status;

    #[ORM\Column(type: 'integer')]
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTemplateId(): ?int
    {
        return $this->template_id;
    }

    public function setTemplateId(int $template_id): self
    {
        $this->template_id = $template_id;

        return $this;
    }

    public function getOrgFirstLine(): ?string
    {
        return $this->org_first_line;
    }

    public function setOrgFirstLine(?string $org_first_line): self
    {
        $this->org_first_line = $org_first_line;

        return $this;
    }

    public function getOrgSecondLine(): ?string
    {
        return $this->org_second_line;
    }

    public function setOrgSecondLine(?string $org_second_line): self
    {
        $this->org_second_line = $org_second_line;

        return $this;
    }

    public function getSubjectFirstLine(): ?string
    {
        return $this->subject_first_line;
    }

    public function setSubjectFirstLine(?string $subject_first_line): self
    {
        $this->subject_first_line = $subject_first_line;

        return $this;
    }

    public function getSubjectSecondLine(): ?string
    {
        return $this->subject_second_line;
    }

    public function setSubjectSecondLine(?string $subject_second_line): self
    {
        $this->subject_second_line = $subject_second_line;

        return $this;
    }

    public function getApprover(): ?int
    {
        return $this->approver;
    }

    public function setApprover(int $approver): self
    {
        $this->approver = $approver;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getUser(): ?int
    {
        return $this->user;
    }

    public function setUser(int $user): self
    {
        $this->user = $user;

        return $this;
    }
}
