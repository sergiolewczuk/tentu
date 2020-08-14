<?php

namespace App\Repository;

use App\Entity\HoraAlmuerzo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HoraAlmuerzo|null find($id, $lockMode = null, $lockVersion = null)
 * @method HoraAlmuerzo|null findOneBy(array $criteria, array $orderBy = null)
 * @method HoraAlmuerzo[]    findAll()
 * @method HoraAlmuerzo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HoraAlmuerzoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HoraAlmuerzo::class);
    }

    // /**
    //  * @return HoraAlmuerzo[] Returns an array of HoraAlmuerzo objects
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
    public function findOneBySomeField($value): ?HoraAlmuerzo
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
