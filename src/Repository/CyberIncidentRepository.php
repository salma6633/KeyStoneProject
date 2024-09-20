<?php

namespace App\Repository;

use App\Entity\CyberIncident;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CyberIncident>
 *
 * @method CyberRiskIncident|null find($id, $lockMode = null, $lockVersion = null)
 * @method CyberRiskIncident|null findOneBy(array $criteria, array $orderBy = null)
 * @method CyberRiskIncident[]    findAll()
 * @method CyberRiskIncident[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CyberIncidentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CyberIncident::class);
    }

//    /**
//     * @return CyberRiskIncident[] Returns an array of CyberRiskIncident objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CyberRiskIncident
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
