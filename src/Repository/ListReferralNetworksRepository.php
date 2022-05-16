<?php

namespace App\Repository;

use App\Entity\ListReferralNetworks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ListReferralNetworks>
 *
 * @method ListReferralNetworks|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListReferralNetworks|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListReferralNetworks[]    findAll()
 * @method ListReferralNetworks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListReferralNetworksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListReferralNetworks::class);
    }

    public function add(ListReferralNetworks $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ListReferralNetworks $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ListReferralNetworks[] Returns an array of ListReferralNetworks objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ListReferralNetworks
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

      /**
     * @return ListReferralNetworks[] Returns an array of ListReferralNetworks objects
     */
    
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.id = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10000)
            ->getQuery()
            ->getResult()
        ;
    }
      
}
