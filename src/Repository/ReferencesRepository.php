<?php

namespace App\Repository;

use App\Entity\References;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class ReferencesRepository
 * @package App\ReferencesRepository
 */
class ReferencesRepository extends ServiceEntityRepository
{
    /** 
    * ReferencesRepository constructor
    * @param ManagerRegistry $registry
    */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, References::class);
    }
}
