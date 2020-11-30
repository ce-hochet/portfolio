<?php

namespace App\Entity;

use App\Repository\ReferencesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class References
 * @package App\Entity;
 * @ORM\Entity(repositoryClass=ReferencesRepository::class)
 */
class References
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
     */
    private ?string $title=null;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private ?string $company=null;

    /**
     * @var string|null
     * @ORM\Column(type="text")
     */
    private ?string $description=null;

    /**
     * @ORM\Column(type="date_immutable")
     */
    private ?DateTimeInterface $startedAt=null;

    /**
     * @ORM\Column(type="date_immutable", nullable=true)
     */
    private ?DateTimeInterface $endedAt=null;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Media", mappedBy="reference")
     */

    private Collection $medias;

    /**
     * Reference constructor
     */
    public function __construct()
    {
        $this->medias = new ArrayCollection();
    }

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
    public function getTitle(): ?string
    {
        return $this->title;
    }

 /**
   * @return string|null $title
   */
    public function setTitle(?string $title): ?string
    {
        $this->title = $title;

        return $this;
    }

 /**
   * @return string|null 
   */
    public function getCompany(): ?string
    {
        return $this->company;
    }

 /**
   * @return string|null $company
   */
    public function setCompany(?string $company): ?string
    {
        $this->company = $company;

        return $this;
    }


 /**
   * @return string|null $company
   */
    public function getDescription(): ?string
    {
        return $this->description;
    }

 /**
   * @return string|null $description
   */

    public function setDescription(?string $description): ?string
    {
        $this->description = $description;

        return $this;
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

        /**
     * @return Collection
     */
    public function getMedias(): Collection
    {
        return $this->medias;
    }

     /**
     * @param Media $media
     */
    public function addMedia(Media $media): void
    {
        if (!$this->medias->contains($media)) {
            $media->setReference($this);
            $this->medias->add($media);
        }
    }

    /**
     * @param Media $media
     */
    public function removeMedia(Media $media): void
    {
        if ($this->medias->contains($media)) {
            $media->setReference(null);
            $this->medias->removeElement($media);

        }
    }
}