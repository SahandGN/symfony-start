<?php

namespace App\Entity;

use App\Model\LiableUserInterface;
use App\Model\TimeInterface;
use App\Model\TimeTrait;
use App\Model\LiableUserTrait;
use App\Repository\AttractionRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;

/** @MappedSuperclass */
#[ORM\Entity(repositoryClass: AttractionRepository::class)]
class Attraction implements TimeInterface, LiableUserInterface
{

    use TimeTrait;
    use LiableUserTrait;


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    protected $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    protected $short_description;

    #[ORM\Column(type: 'string', length: 500, nullable: true)]
    protected $full_description;

    #[ORM\Column(type: 'integer')]
    protected $score;

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

    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }

    public function setShortDescription(?string $short_description): self
    {
        $this->short_description = $short_description;

        return $this;
    }

    public function getFullDescription(): ?string
    {
        return $this->full_description;
    }

    public function setFullDescription(?string $full_description): self
    {
        $this->full_description = $full_description;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

}
