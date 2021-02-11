<?php

namespace App\Repository;

use App\Entity\Vip;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vip|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vip|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vip[]    findAll()
 * @method Vip[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VipRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vip::class);
    }

    public function findAll()
    {
        $registry=$this->getEntityManager();
        $qb=$registry->createQueryBuilder();
        $qb->select("v")
            ->from("App:Vip ","v");
        $qb->getDql();
        $query=$qb->getQuery();
        $Vips=$query->getArrayResult();
        return $Vips;
    }

    // /**
    //  * @return Vip[] Returns an array of Vip objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vip
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
