<?php

namespace App\Repository;

use App\Entity\Car;
use App\Entity\Booking;
use App\Entity\Model;
use App\Entity\Search;
use App\Form\CarType;
use App\Form\ModelType;
use Doctrine\ORM\Query;
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


  
    
    
    
    public function findByDateandBrand($brand,$pickdate, $returndate)
    {  
         
        return $this->createQueryBuilder('c')
            ->innerJoin('c.bookings','b')
            ->andWhere('c.brand = :brand')
            ->andWhere('b.pickDate = :pickDate')
            ->andWhere('b.returnDate = :returnDate')
            ->setParameter('brand', $brand)
            ->setParameter('pickDate', $pickdate)
            ->setParameter('returnDate', $returndate)
            ->getQuery()
            ->getResult()
        ;
    }
    public function findFilter(Booking $booking)
    {
        
           $qb = $this->createQueryBuilder('c');
        //    $qb->select('c.id, b.pickDate, b.returnDate, c.brand')
        //     ->join('c.bookings', "b")
        //     ->getQuery()
        //     ->getResult();
        //      return $qb;
       
        if ($booking->getPickDate()) {
            $qb = $qb
            ->select('c.id, c.image, c.brand, c.year, c.seats, c.transmission, c.price, b.pickDate, b.returnDate')
            ->join('c.bookings',"b")
            ->andWhere('b.pickDate >= :date')
            ->setParameter('date', $booking->getPickDate());            
                  
             }
        if ($booking->getReturnDate()) {
            $qb = $qb
             ->andWhere('b.returnDate <= :date')
             ->setParameter('date', $booking->getReturnDate());

        
            }
            
    
       
            // dd($qb->getQuery()->getResult());
        return $qb->getQuery()->getResult();
                 
          
    }

    
    public function findByMinPrice($minprice,$maxprice)
    
     {
        return $this->createQueryBuilder('c')
            ->andWhere('c.price > :minPrice')
           ->setParameter('minPrice', $minprice)
            ->andWhere('c.price < :maxPrice')
            ->setParameter('maxPrice', $maxprice)
              ->getQuery()
               ->getResult()
            ;
       }

    //   
    //    
    //     
    //    }
       

    //     if ($carsearch->getCarBrand()) {
    //         $qb = $qb
    //     ->andWhere('c.brand = :carbrand')
    //     ->setParameter('carbrand', $carsearch->getCarBrand());

        
    //         }
    //         return $query->getQuery()->getResult();
    // }


















    // public function findFilter($form)
    // {
    //     $qb = $this->createQueryBuilder('c');

    //     if ($form['brand']) {
    //         $qb->andWhere('c.brand = :brand')
    //             ->setParameter('brand', $form['brand']);
    //     }

    //     if ($form['year']) {
    //         $qb->andWhere('c.year = :year')
    //             ->setParameter('year', $form['year']);
    //     }

    //     if ($form['price']) {
    //         $qb->andWhere('c.price = :price')
    //             ->setParameter('price', $form['price']);
    //     }

    //     if ($form['image']) {
    //         $qb->andWhere('c.image= :image')
    //             ->setParameter('image', $form['image']);
    //     }

    //     if ($form['isNew']) {
    //         if ($form['isNew'] === 'yes') {
    //             $qb->andWhere('c.isNew = true');
    //         } else {
    //             $qb->andWhere('c.isNew = false');
    //         }
    //     }

    //     return $qb->orderBy('c.id', 'ASC')
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }

    

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
