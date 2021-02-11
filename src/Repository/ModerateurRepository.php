<?php

namespace App\Repository;

use App\Entity\Moderateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Moderateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Moderateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Moderateur[]    findAll()
 * @method Moderateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModerateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Moderateur::class);
    }

    public function findAll()
    {
        $registry=$this->getEntityManager();
        $qb=$registry->createQueryBuilder();
        $qb->select("m")
            ->from("App:Moderateur ","m");
        $qb->getDql();
        $query=$qb->getQuery();
        $Moderateurs=$query->getArrayResult();
        return $Moderateurs;
    }

    public function findByConnect($login,$mdp)
    {
        $registry=$this->getEntityManager();
        $qb=$registry->createQueryBuilder();
        $qb->select("m.idModerateur,m.superModo")
            ->from("App:Moderateur ","m")
            ->where('m.pseudoModerateur = :login')
            ->andwhere('m.mdp = :mdp')
            ->setParameter(":login",$login)
            ->setParameter(":mdp",$mdp);
        $qb->getDql();
        $query=$qb->getQuery();
        $Moderateurs=$query->getResult();
        return $Moderateurs;
    }

    public function findById($id)
    {
        $registry=$this->getEntityManager();
        $qb=$registry->createQueryBuilder();
        $qb->select("m")
            ->from("App:Moderateur ","m")
            ->where('m.idModerateur = :id')
            ->setParameter(":id",$id);
        $qb->getDql();
        $query=$qb->getQuery();
        $Moderateurs=$query->getSingleResult();
        return $Moderateurs;
    }

    public function modifyByProfil($mail,$mdp,$id)
    {
        $registry=$this->getEntityManager();
        $qb=$registry->createQueryBuilder();
        $qb->update("App:Moderateur",'m')
            ->set("m.email",":email")
            ->set("m.mdp",':mdp')
            ->where('m.idModerateur = :id')
            ->setParameter(":email",$mail)
            ->setParameter(":mdp",$mdp)
            ->setParameter(":id",$id);
        $qb->getDql();
        $query=$qb->getQuery();
        $query->execute();
    }

    public function modifyByAdd($mail,$mdp,$id)
    {
        $registry=$this->getEntityManager();
        $qb=$registry->createQueryBuilder();
        $qb->update("App:Moderateur",'m')
            ->set("m.email",":email")
            ->set("m.mdp",':mdp')
            ->set("m.linkIsUsed",'1')
            ->where('m.idModerateur = :id')
            ->setParameter(":email",$mail)
            ->setParameter(":mdp",$mdp)
            ->setParameter(":id",$id);
        $qb->getDql();
        $query=$qb->getQuery();
        $query->execute();
    }

    public function findBylink($link)
    {
        $registry=$this->getEntityManager();
        $qb=$registry->createQueryBuilder();
        $qb->select("m")
            ->from("App:Moderateur ","m")
            ->where('m.lien = :link')
            ->setParameter(":link",$link);
        $qb->getDql();
        $query=$qb->getQuery();
        $Moderateurs=$query->getResult();
        return $Moderateurs;
    }

    public function deleteById($id)
    {
        $registry=$this->getEntityManager();
        $qb=$registry->createQueryBuilder();
        $qb->delete('App:Moderateur', 'm');
        $qb->where('m.idModerateur = :id');
        $qb->setParameter(':id', $id);

    }


    // /**
    //  * @return Moderateur[] Returns an array of Moderateur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Moderateur
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
