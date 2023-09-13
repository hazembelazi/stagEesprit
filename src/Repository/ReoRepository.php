<?php

namespace App\Repository;

use App\Entity\Reo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Reo>
 *
 * @method Reo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reo[]    findAll()
 * @method Reo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reo::class);
    }

//    /**
//     * @return Reo[] Returns an array of Reo objects
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

//    public function findOneBySomeField($value): ?Reo
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
