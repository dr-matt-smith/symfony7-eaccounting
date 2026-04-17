<?php

namespace App\Entity;

use App\Repository\CaseStudyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaseStudyRepository::class)]
class CaseStudy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $colourCoding = null;

    #[ORM\Column]
    private ?int $hints = null;

    #[ORM\Column]
    private ?text $introduction = null;
}