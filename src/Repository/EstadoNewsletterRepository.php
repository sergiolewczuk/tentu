<?php

namespace App\Repository;

use App\Entity\EstadoNewsletter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EstadoNewsletter|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstadoNewsletter|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstadoNewsletter[]    findAll()
 * @method EstadoNewsletter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstadoNewsletterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EstadoNewsletter::class);
    }

    // /**
    //  * @return EstadoNewsletter[] Returns an array of EstadoNewsletter objects
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
    public function findOneBySomeField($value): ?EstadoNewsletter
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
