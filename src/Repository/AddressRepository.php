<?php

namespace App\Repository;

use App\Entity\Address;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Address|null find($id, $lockMode = null, $lockVersion = null)
 * @method Address|null findOneBy(array $criteria, array $orderBy = null)
 * @method Address[]    findAll()
 * @method Address[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AddressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Address::class);
    }

    // /**
    //  * @return Address[] Returns an array of Address objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Address
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
	
	    public function findnameByid($id):?string
    {

            $a=$this->createQueryBuilder('u')
            ->select('u.address')
            ->Where('u.id = :val')
            ->setParameter('val', $id)
            ->getQuery()
            ->getResult();
            if(is_array($a)){
                return $a[0]['address'];
            }else{
                return "Unknown";
            }


    }

    public function GetnameChoice()
    {

        $conn = $this->getEntityManager()->getConnection();
        $sql = 'SELECT address,id FROM address  ORDER BY id ASC';

        $a=$conn->executeQuery($sql)->fetchAllKeyValue();

        /*
        $a=$this->createQueryBuilder('u')
            ->select('u.address,u.id')
            ->orderBy('u.id', 'ASC')
            ->getQuery()
            ->getResult();
*/
            return $a;



    }
}
