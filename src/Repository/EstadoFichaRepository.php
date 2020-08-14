<?php

namespace App\Repository;

use App\Entity\EstadoFicha;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EstadoFicha|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstadoFicha|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstadoFicha[]    findAll()
 * @method EstadoFicha[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstadoFichaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EstadoFicha::class);
    }

    // /**
    //  * @return EstadoFicha[] Returns an array of EstadoFicha objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EstadoFicha
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
