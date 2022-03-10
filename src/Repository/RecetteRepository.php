<?php

namespace App\Repository;

use App\Entity\Recette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Recette|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recette|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recette[]    findAll()
 * @method Recette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recette::class);
    }

    /*
     * Fonction pour afficher 3 recettes.html.twig aléatoires dans l'accueil
     * Affiche des recettes.html.twig correspondant au COOKIE si il est set
     */
    public function randomRecette() {
        if (isset($_COOKIE['typerecette']) && $_COOKIE['typerecette'] != 'all') {
            //echo 'cookie marche';
            return $this->createQueryBuilder('r')
                ->where('r.type_id = :cookie')
                ->setParameter('cookie', $_COOKIE['typerecette'])
                ->orderBy('RAND()')
                ->setMaxResults(2)
                ->getQuery()
                ->setParameter('cookie', $_COOKIE['typerecette'])
                ->getResult()
                ;
        }
        else {
            //echo 'merde, cookie marche pas';
            return $this->createQueryBuilder('r')
                ->orderBy('RAND()')
                ->setMaxResults(2)
                ->getQuery()
                ->getResult()
                ;
        }
    }


    // /**
    //  * @return Recette[] Returns an array of Recette objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Recette
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
