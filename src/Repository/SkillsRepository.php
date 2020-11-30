<?php

namespace App\Repository;

use App\Entity\Skills;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class SkillsRepository
 * @package App\SkillsRepository
 */
class SkillsRepository extends ServiceEntityRepository
{
    /** 
    * SkillsRepository constructor
    * @param ManagerRegistry $registry
    */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Skills::class);
    }
}
