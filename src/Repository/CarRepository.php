<?php

namespace App\Repository;

use App\Entity\Car;
use App\Form\CarType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    public function findFilter($form)
    {
        $qb = $this->createQueryBuilder('c');

        if ($form['brand']) {
            $qb->andWhere('c.brand = :brand')
                ->setParameter('brand', $form['brand']);
        }

        if ($form['year']) {
            $qb->andWhere('c.year = :year')
                ->setParameter('year', $form['year']);
        }

        if ($form['price']) {
            $qb->andWhere('c.price = :price')
                ->setParameter('price', $form['price']);
        }

        if ($form['image']) {
            $qb->andWhere('c.image= :image')
                ->setParameter('image', $form['image']);
        }

        if ($form['isNew']) {
            if ($form['isNew'] === 'yes') {
                $qb->andWhere('c.isNew = true');
            } else {
                $qb->andWhere('c.isNew = false');
            }
        }

        return $qb->orderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Car[] Returns an array of Car objects
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
    public function findOneBySomeField($value): ?Car
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
