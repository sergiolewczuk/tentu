<?php

namespace App\Repository;

use App\Entity\HistoriaPersonal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HistoriaPersonal|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoriaPersonal|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoriaPersonal[]    findAll()
 * @method HistoriaPersonal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoriaPersonalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoriaPersonal::class);
    }

    // /**
    //  * @return HistoriaPersonal[] Returns an array of HistoriaPersonal objects
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
    public function findOneBySomeField($value): ?HistoriaPersonal
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
