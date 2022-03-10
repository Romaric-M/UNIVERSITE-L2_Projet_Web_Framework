<?php

namespace App\Repository;

use App\Entity\TypeRecette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeRecette|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeRecette|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeRecette[]    findAll()
 * @method TypeRecette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeRecetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeRecette::class);
    }

    // /**
    //  * @return TypeRecette[] Returns an array of TypeRecette objects
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
    public function findOneBySomeField($value): ?TypeRecette
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
