<?php

namespace App\Repository;

use App\Entity\Suenio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Suenio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Suenio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Suenio[]    findAll()
 * @method Suenio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SuenioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Suenio::class);
    }

    // /**
    //  * @return Suenio[] Returns an array of Suenio objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Suenio
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
