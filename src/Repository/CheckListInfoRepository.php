<?php

namespace App\Repository;

use App\Entity\CheckListInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CheckListInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method CheckListInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method CheckListInfo[]    findAll()
 * @method CheckListInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CheckListInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CheckListInfo::class);
    }

    // /**
    //  * @return CheckListInfo[] Returns an array of CheckListInfo objects
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
    public function findOneBySomeField($value): ?CheckListInfo
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
