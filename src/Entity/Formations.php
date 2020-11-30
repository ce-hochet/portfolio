<?php

namespace App\Entity;

use App\Repository\FormationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Formations
 * @package App\Entity;
 * @ORM\Entity(repositoryClass=FormationsRepository::class)
 */

 Class Formations {

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
    */
   private ?string $name=null;

   /**
    * @var int|null
    * @ORM\Column(type="integer")
    */
   private  ?int $gradeLevel =null;

   /**
    * @var string|null
    * @ORM\Column(type="text")
    */
   private ?string $description=null;

      /**
       * @var DateTimeInterface|null
       * @ORM\Column(type="date_immutable")
       */
   private ?DateTimeInterface $startedAt=null;

      /**
       * @var DateTimeInterface|null
       * @ORM\Column(type="date_immutable", nullable=true)
       */
   private ?DateTimeInterface $endedAt=null;

   /**
       * @return int|null
       */
   public function getId(): ?int
   {
       return $this->$id;
   }

   /**
   * @return string|null 
   */
   public function getName(): ?string
   {
       return $this->$name;
   }

   /**
       * @return string|null $name
       */
   public function setName(?string $name): void
   {
       $this->name = $name;

   }
   /**
       * @return int|null
       */
   public function getGradeLevel(): ?int
   {
       return $this->$gradeLevel;
   }

   /**
       * @return int|null $level
       */
   public function setGradeLevel(?int $gradeLevel): void
   {
       $this->$gradeLevel = $gradeLevel;

   }

  
    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getStartedAt(): ?DateTimeInterface
    {
        return $this->startedAt;
    }

    /**
     * @param DateTimeInterface|null $startedAt
     */
    public function setStartedAt(?DateTimeInterface $startedAt): void
    {
        $this->startedAt = $startedAt;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getEndedAt(): ?DateTimeInterface
    {
        return $this->endedAt;
    }

    /**
     * @param DateTimeInterface|null $endedAt
     */
    public function setEndedAt(?DateTimeInterface $endedAt): void
    {
        $this->endedAt = $endedAt;
    }

 }
