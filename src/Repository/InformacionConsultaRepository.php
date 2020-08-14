<?php

namespace App\Repository;

use App\Entity\InformacionConsulta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InformacionConsulta|null find($id, $lockMode = null, $lockVersion = null)
 * @method InformacionConsulta|null findOneBy(array $criteria, array $orderBy = null)
 * @method InformacionConsulta[]    findAll()
 * @method InformacionConsulta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InformacionConsultaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InformacionConsulta::class);
    }

    // /**
    //  * @return InformacionConsulta[] Returns an array of InformacionConsulta objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InformacionConsulta
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
