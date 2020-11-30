<?php

namespace App\Entity;

use App\Repository\SkillsRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Skils
 * @package App\Entity;
 * @ORM\Entity(repositoryClass=SkillsRepository::class)
 */

class Skills
{
    /**
     * @var int|null
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    private ?int $id=null;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide")
     */
    private ?string $name=null;

    /**
     * @var int|null
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *     min=1,
     *     max=10,
     *     minMessage="Le niveau doit être supérieur ou égal à 1",
     *     maxMessage="Le niveau doit être inférieur ou égal à 10"
     * )
     */
  
    private  ?int $level =null;

    /**
        * @return int|null
        */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
    * @return string|null $name
    */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
        * @return string|null
        */
    public function setName(?string $name): void
    {
        $this->name = $name;

    }
    /**
        * @return int|null
        */
    public function getLevel(): ?int
    {
        return $this->level;
    }

    /**
        * @return int|null $level
        */
    public function setLevel(?int $level): void
    {
        $this->level = $level;

    }
}
