<?php

namespace App\Repository;

use App\Entity\TipoPatologia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoPatologia|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoPatologia|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoPatologia[]    findAll()
 * @method TipoPatologia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoPatologiaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoPatologia::class);
    }

    // /**
    //  * @return TipoPatologia[] Returns an array of TipoPatologia objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TipoPatologia
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
