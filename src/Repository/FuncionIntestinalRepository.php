<?php

namespace App\Repository;

use App\Entity\FuncionIntestinal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FuncionIntestinal|null find($id, $lockMode = null, $lockVersion = null)
 * @method FuncionIntestinal|null findOneBy(array $criteria, array $orderBy = null)
 * @method FuncionIntestinal[]    findAll()
 * @method FuncionIntestinal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FuncionIntestinalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FuncionIntestinal::class);
    }

    // /**
    //  * @return FuncionIntestinal[] Returns an array of FuncionIntestinal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FuncionIntestinal
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
