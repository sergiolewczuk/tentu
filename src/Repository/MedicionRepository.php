<?php

namespace App\Repository;

use App\Entity\Medicion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Medicion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medicion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medicion[]    findAll()
 * @method Medicion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Medicion::class);
    }

    // /**
    //  * @return Medicion[] Returns an array of Medicion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Medicion
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
