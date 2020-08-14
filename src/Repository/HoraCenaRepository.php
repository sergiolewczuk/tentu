<?php

namespace App\Repository;

use App\Entity\HoraCena;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HoraCena|null find($id, $lockMode = null, $lockVersion = null)
 * @method HoraCena|null findOneBy(array $criteria, array $orderBy = null)
 * @method HoraCena[]    findAll()
 * @method HoraCena[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HoraCenaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HoraCena::class);
    }

    // /**
    //  * @return HoraCena[] Returns an array of HoraCena objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HoraCena
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
