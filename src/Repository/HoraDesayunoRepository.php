<?php

namespace App\Repository;

use App\Entity\HoraDesayuno;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HoraDesayuno|null find($id, $lockMode = null, $lockVersion = null)
 * @method HoraDesayuno|null findOneBy(array $criteria, array $orderBy = null)
 * @method HoraDesayuno[]    findAll()
 * @method HoraDesayuno[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HoraDesayunoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HoraDesayuno::class);
    }

    // /**
    //  * @return HoraDesayuno[] Returns an array of HoraDesayuno objects
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
    public function findOneBySomeField($value): ?HoraDesayuno
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
