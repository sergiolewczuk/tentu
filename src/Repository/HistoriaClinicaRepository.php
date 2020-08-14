<?php

namespace App\Repository;

use App\Entity\HistoriaClinica;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HistoriaClinica|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoriaClinica|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoriaClinica[]    findAll()
 * @method HistoriaClinica[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoriaClinicaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoriaClinica::class);
    }

    // /**
    //  * @return HistoriaClinica[] Returns an array of HistoriaClinica objects
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
    public function findOneBySomeField($value): ?HistoriaClinica
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
