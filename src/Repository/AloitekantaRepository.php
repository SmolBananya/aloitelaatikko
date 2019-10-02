<?php

namespace App\Repository;

use App\Entity\Aloitekanta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Aloitekanta|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aloitekanta|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aloitekanta[]    findAll()
 * @method Aloitekanta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AloitekantaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aloitekanta::class);
    }

    // /**
    //  * @return Aloitekanta[] Returns an array of Aloitekanta objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Aloitekanta
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
