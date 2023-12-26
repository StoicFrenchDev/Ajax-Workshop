<?php

namespace App\Repository;

use App\Entity\Enemy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Enemy>
 *
 * @method Enemy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Enemy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Enemy[]    findAll()
 * @method Enemy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnemyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Enemy::class);
    }

//    /**
//     * @return Enemy[] Returns an array of Enemy objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Enemy
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
