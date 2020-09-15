<?php

namespace App\Repository;

use App\Entity\CarSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CarSearch|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarSearch|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarSearch[]    findAll()
 * @method CarSearch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarSearchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarSearch::class);
    }

    // /**
    //  * @return CarSearch[] Returns an array of CarSearch objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CarSearch
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
