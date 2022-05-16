<?php

namespace App\Repository;

use App\Entity\ReferralNetwork;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReferralNetwork>
 *
 * @method ReferralNetwork|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReferralNetwork|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReferralNetwork[]    findAll()
 * @method ReferralNetwork[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferralNetworkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReferralNetwork::class);
    }

    public function add(ReferralNetwork $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ReferralNetwork $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ReferralNetwork[] Returns an array of ReferralNetwork objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ReferralNetwork
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

public function findByExampleField()
{
    return $this->createQueryBuilder('r')
        //->andWhere('r.exampleField = :val')
        //->setParameter('val', $value)
        ->orderBy ('r.id', 'DESC')
        ->setMaxResults(2)
        ->getQuery()
        ->getResult()
    ;
}

/**
 * @return ReferralNetwork[] Returns an array of ReferralNetwork objects
 */

public function findByIdLastField()
{
    return $this->createQueryBuilder('r')
        //->andWhere('r.exampleField = :val')
        //->setParameter('val', $value)
        ->orderBy ('r.id', 'DESC')
        ->setMaxResults(1)
        ->getQuery()
        ->getResult()
    ;
}

/**
 * @return ReferralNetwork[] Returns an array of ReferralNetwork objects
 */

public function findByIdFirstField()
{
    return $this->createQueryBuilder('r')
        //->andWhere('r.exampleField = :val')
        //->setParameter('val', $value)
        ->orderBy ('r.id', 'ASC')
        ->setMaxResults(1)
        ->getQuery()
        ->getResult()
    ;
}

/**
 * @return ReferralNetwork[] Returns an array of ReferralNetwork objects
 */

public function findByLeftField($value)
{
    return $this->createQueryBuilder('r')
        ->andWhere('r.user_status = :val')
        ->setParameter('val', $value)
        ->orderBy ('r.id', 'DESC')
        ->setMaxResults(10000)
        ->getQuery()
        ->getResult()
    ;
}

/**
 * @return ReferralNetwork[] Returns an array of ReferralNetwork objects
 */

public function findByUserIdField($value)
{
    return $this->createQueryBuilder('r')
        ->andWhere('r.user_id = :val')
        ->setParameter('val', $value)
        ->orderBy ('r.id', 'DESC')
        ->setMaxResults(10000)
        ->getQuery()
        ->getResult()
    ;
}

/**
 * @return ReferralNetwork[] Returns an array of ReferralNetwork objects
 */

public function findByRightField($value)
{
    return $this->createQueryBuilder('r')
        ->andWhere('r.user_status = :val')
        ->setParameter('val', $value)
        ->orderBy ('r.id', 'ASC')
        ->setMaxResults(10000)
        ->getQuery()
        ->getResult()
    ;
}

/**
 * @return ReferralNetwork[] Returns an array of ReferralNetwork objects
 */

public function findByMyTeamField($value)
{
    return $this->createQueryBuilder('r')
        ->andWhere('r.my_team = :val')
        ->setParameter('val', $value)
        ->orderBy ('r.id', 'ASC')
        ->setMaxResults(10000)
        ->getQuery()
        ->getResult()
    ;
}

/**
 * @return ReferralNetwork[] Returns an array of ReferralNetwork objects
 */

public function findByMemberField($value)
{
    return $this->createQueryBuilder('r')
        ->andWhere('r.network_code = :val')
        ->setParameter('val', $value)
        ->orderBy ('r.id', 'ASC')
        ->setMaxResults(100000)
        ->getQuery()
        ->getResult()
    ;
}

public function findByBalanceField($value, $balance)
{
    return $this->createQueryBuilder('r')
        ->andWhere('r.user_status = :val', 'r.balance > :balance')
        ->setParameter('val', $value)
        ->setParameter('balance', $balance)
        ->orderBy ('r.id', 'ASC')
        ->setMaxResults(100000)
        ->getQuery()
        ->getResult()
    ;
}

public function findByBalanceToPointField($value,$balance,$id)
{
    return $this->createQueryBuilder('r')
        ->andWhere('r.user_status = :val', 'r.balance > :balance', 'r.id < :id')
        //->where('r.id = ?40')
        //->where('r.id = ?42')
        ->setParameter('val', $value)
        ->setParameter('balance', $balance)
        ->orderBy ('r.id', 'ASC')
        ->setParameter('id', $id) 
        //->setFirstResult( 40 )
        ->setMaxResults(1000)
        ->getQuery()
        ->getResult()
    ;
}

public function findByBalanceFromPointField($value,$balance,$id)
{
    return $this->createQueryBuilder('r')
        ->andWhere('r.user_status = :val', 'r.balance > :balance', 'r.id > :id')
        //->where('r.id = ?40')
        //->where('r.id = ?42')
        ->setParameter('val', $value)
        ->setParameter('balance', $balance)
        ->orderBy ('r.id', 'ASC')
        ->setParameter('id', $id) 
        //->setFirstResult( 40 )
        ->setMaxResults(1000)
        ->getQuery()
        ->getResult()
    ;
}


public function findByStatusField($value,$network_code)
{
    return $this->createQueryBuilder('r')
        ->andWhere('r.user_status = :val', 'r.network_code = :network_code')
        //->where('r.id = ?40')
        //->where('r.id = ?42')
        ->setParameter('val', $value)
        ->setParameter('network_code', $network_code)
        ->orderBy ('r.id', 'ASC')
        //->setParameter('id', $id) 
        //->setFirstResult( 40 )
        ->setMaxResults(100000)
        ->getQuery()
        ->getResult()
    ;
}


public function findOneBySomeField($value): ?ReferralNetwork
{
    return $this->createQueryBuilder('r')
        ->andWhere('r.user_status = :val')
        ->setParameter('val', $value)
        ->getQuery()
        ->getOneOrNullResult()
    ;
}

public function findOneByReferralField($value): ?ReferralNetwork
{
    return $this->createQueryBuilder('r')
        ->andWhere('r.user_id = :val')
        ->setParameter('val', $value)
        ->getQuery()
        ->getOneOrNullResult()
    ;
}


/**
 * @return ReferralNetwork[] Returns an array of ReferralNetwork objects
 */

public function findByCountField()
{

    $entityManager = $this->getEntityManager();

    $query = $entityManager->createQuery(
        'SELECT COUNT (r.id)
         FROM App\Entity\ReferralNetwork r'
        )->getSingleScalarResult();

    // returns an array of Product objects
    return $query;
}

public function findOneByMyTeamStatus($value,$status): ?ReferralNetwork
{
    return $this->createQueryBuilder('r')
        ->andWhere('r.member_code = :val')
        ->andWhere('r.user_status = :stat')
        ->setParameter('val', $value)
        ->setParameter('stat', $status)
        ->getQuery()
        ->getOneOrNullResult()
    ;
}
}
