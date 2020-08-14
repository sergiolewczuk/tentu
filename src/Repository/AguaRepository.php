<?php

namespace App\Repository;

use App\Entity\Agua;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Agua|null find($id, $lockMode = null, $lockVersion = null)
 * @method Agua|null findOneBy(array $criteria, array $orderBy = null)
 * @method Agua[]    findAll()
 * @method Agua[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AguaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Agua::class);
    }

    // /**
    //  * @return Agua[] Returns an array of Agua objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Agua
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
