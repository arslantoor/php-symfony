<?php

namespace App\Repository;

use App\Entity\CheckListCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CheckListCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method CheckListCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method CheckListCategory[]    findAll()
 * @method CheckListCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CheckListCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CheckListCategory::class);
    }

    // /**
    //  * @return CheckListCategory[] Returns an array of CheckListCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CheckListCategory
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
