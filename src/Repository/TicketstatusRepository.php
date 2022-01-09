<?php

namespace App\Repository;

use App\Entity\Ticketstatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @method Ticketstatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ticketstatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ticketstatus[]    findAll()
 * @method Ticketstatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketstatusRepository extends ServiceEntityRepository
{




    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ticketstatus::class);
    }




// /**
    //  * @return Ticketstatus[] Returns an array of Ticketstatus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ticketstatus
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
