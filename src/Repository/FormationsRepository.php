<?php

namespace App\Repository;

use App\Entity\Formations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class FormationsRepository
 * @package App\FormationsRepository
 */
class FormationsRepository extends ServiceEntityRepository
{
    /** 
    * FormationsRepository constructor
    * @param ManagerRegistry $registry
    */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Formations::class);
    }
}
