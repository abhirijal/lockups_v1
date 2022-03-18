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
    private $approver;

    #[ORM\Column(type: 'integer')]
    private $status;

    #[ORM\ManyToOne(targetEntity: LockupTemplates::class)]
    #[ORM\JoinColumn(nullable: false, referencedColumnName:"id")]
    private $template;

    #[ORM\ManyToOne(targetEntity: Users::class)]
    private $user;

    #[ORM\Column(type: 'text', nullable: true)]
    private $PreviewH;

    #[ORM\Column(type: 'text', nullable: true)]
    private $PreviewV;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTemplate(): ?LockupTemplates
    {
        return $this->template;
    }

    public function setTemplate(?LockupTemplates $template): self
    {
        $this->template = $template;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPreviewH(): ?string
    {
        return $this->PreviewH;
    }

    public function setPreviewH(?string $PreviewH): self
    {
        $this->PreviewH = $PreviewH;

        return $this;
    }

    public function getPreviewV(): ?string
    {
        return $this->PreviewV;
    }

    public function setPreviewV(?string $PreviewV): self
    {
        $this->PreviewV = $PreviewV;

        return $this;
    }
}
