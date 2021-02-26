<?php

namespace App\Repository;

use App\Entity\Dispositivos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Dispositivos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dispositivos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dispositivos[]    findAll()
 * @method Dispositivos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DispositivosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Dispositivos::class);
    }

    // /**
    //  * @return Dispositivos[] Returns an array of Dispositivos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dispositivos
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
