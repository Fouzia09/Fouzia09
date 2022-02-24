<?php

namespace App\Repository;

use App\Entity\Room;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Room|null find($id, $lockMode = null, $lockVersion = null)
 * @method Room|null findOneBy(array $criteria, array $orderBy = null)
 * @method Room[]    findAll()
 * @method Room[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Room::class);
    }

    /**
     * @param string $type
     * @param string $value
     * 
     * @return Room[]
     */
    public function findByType($type, $value)
    {
        $property = "r.{$type}";
        
        return $this->createQueryBuilder('r')
            ->andWhere("{$property} = :val")
            ->setParameter('val', $value)
            ->orderBy('r.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param string $value
     * 
     * @return Room[]
     */
    public function findBySquarFeet($value)
    {
        list($min, $max) = explode('-', $value);

        return $this->createQueryBuilder('r')
            ->andWhere('r.squarFeet BETWEEN :min AND :max')
            ->setParameter('min', $min)
            ->setParameter('max', $max)
            ->orderBy('r.name', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
    * @return Room[] Returns an array of Room objects
    */
    
    public function findByValue($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.price = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Room[]
     */
    public function findThreeLast()
    {
        return $this->createQueryBuilder('r')
            ->andWhere("r.isPublished = true")
            ->setMaxResults(3)
            ->orderBy('r.createdAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
    

    /*
    public function findOneBySomeField($value): ?Room
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
