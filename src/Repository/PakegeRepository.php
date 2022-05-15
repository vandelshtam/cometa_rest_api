<?php

namespace App\Repository;

use App\Entity\Pakege;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Pakege>
 *
 * @method Pakege|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pakege|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pakege[]    findAll()
 * @method Pakege[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PakegeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pakege::class);
    }

    public function add(Pakege $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Pakege $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Pakege[] Returns an array of Pakege objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Pakege
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

        /**
      * @return Pakege[] Returns an array of Pakege objects
      */
    
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.referral_networks_id = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10000)
            ->getQuery()
            ->getResult()
        ;
    }


    public function findByExampleIdField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.user_id = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10000)
            ->getQuery()
            ->getResult()
        ;
    }
    

     /**
      * @return Pakege[] Returns an array of Pakege objects
      */
    
      public function findByExampleClientField($value)
      {
          return $this->createQueryBuilder('p')
              ->andWhere('p.client_code = :val')
              ->setParameter('val', $value)
              ->orderBy('p.id', 'ASC')
              ->setMaxResults(10000)
              ->getQuery()
              ->getResult()
          ;
      }
      

    
    public function findOneBySomeField($value): ?Pakege
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.referral_networks_id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findByPakageActionField($name_multi_pakage, $user_id, $multi_pakage_day,$action)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.name = :val','r.user_id = :uid', 'r.updated_at < :day', 'r.action = :nl')
            ->setParameter('val', $name_multi_pakage)
            ->setParameter('day', $multi_pakage_day)
            ->setParameter('uid', $user_id)
            ->setParameter('nl', $action)
            ->orderBy ('r.id', 'ASC')
            ->setMaxResults(10000)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByPakageUpdateField($client_code, $updated_at)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.client_code = :val', 'r.updated_at < : day')
            ->setParameter('val', $client_code)
            ->setParameter('day', $updated_at)
            ->orderBy ('r.id', 'ASC')
            ->setMaxResults(10000)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByPakageNoUpdateField($client_code, $multi_pakage_day)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.client_code = :val','r.updated_at < :day')
            ->setParameter('val', $client_code)
            ->setParameter('day', $multi_pakage_day)
            ->orderBy ('r.id', 'ASC')
            ->setMaxResults(10000)
            ->getQuery()
            ->getResult()
        ;
    } 
}
