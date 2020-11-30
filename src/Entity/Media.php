<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Media
 * @package App\Entity;
 * @ORM\Entity(repositoryClass=MediaRepository::class)
 */

 Class Media {

   /**
    * @var int|null
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    * @ORM\Column(type="integer")
    */
   private ?int $id=null;

   /**
    * @var string|null
    * @ORM\Column
    */
   private ?string $path=null;

  /**
     * @var Reference|null
     * @ORM\ManyToOne(targetEntity="References", inversedBy="medias")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
  private ?Reference $reference;

   /**
       * @return int|null
       */
   public function getId(): ?int
   {
       return $this->id;
   }

   /**
       * @return string|null
       */
   public function getPath(): ?int
   {
       return $this->path;
   }

    /**
       * @return string|null $level
       */
   public function setPath(?int $path): void
   {
       $this->$path = $path;

   }

 /**
       * @return Reference|null
       */
   public function getReference(): ?Reference
   {
       return $this->Reference;
   }

    /**
     * @param Reference|null $reference
     */
    public function setReference(?Reference $reference): void
    {
        $this->reference = $reference;
    }

}
