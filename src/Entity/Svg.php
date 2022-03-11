<?php

namespace App\Entity;

use App\Repository\SvgRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SvgRepository::class)]
class Svg
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'blob', nullable: true)]
    private $value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value): self
    {
        $this->value = $value;

        return $this;
    }
}
