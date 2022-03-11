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

    #[ORM\Column(type: 'integer')]
    private $user;

    #[ORM\ManyToOne(targetEntity: LockupTemplates::class)]
    #[ORM\JoinColumn(nullable: false, referencedColumnName:"id")]
    private $template;

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

    public function getUser(): ?int
    {
        return $this->user;
    }

    public function setUser(int $user): self
    {
        $this->user = $user;

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
}
