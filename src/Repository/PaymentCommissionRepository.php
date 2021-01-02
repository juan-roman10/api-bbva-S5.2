<?php

namespace App\Repository;

use App\Entity\PaymentCommission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PaymentCommission|null find($id, $lockMode = null, $lockVersion = null)
 * @method PaymentCommission|null findOneBy(array $criteria, array $orderBy = null)
 * @method PaymentCommission[]    findAll()
 * @method PaymentCommission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaymentCommissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PaymentCommission::class);
    }

    // /**
    //  * @return PaymentCommission[] Returns an array of PaymentCommission objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PaymentCommission
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
