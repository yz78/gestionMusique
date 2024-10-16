<?php

namespace App\Repository;

use App\Entity\Album;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Album>
 *
 * @method Album|null find($id, $lockMode = null, $lockVersion = null)
 * @method Album|null findOneBy(array $criteria, array $orderBy = null)
 * @method Album[]    findAll()
 * @method Album[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlbumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Album::class);
    }

    /** 
    *@return Query Returns an array of Album objects
    */


   public function listeAlbumsComplete() : ?Query
    {
        return $this->createQueryBuilder('m')
            ->select('m','s','art','r')
            ->innerJoin('m.styles', 's')
            ->innerJoin('m.artiste','art')
            ->innerJoin('m.morceaux','r')
            ->orderBy('m.nom', 'ASC')
            ->getQuery()
       ;
    }

//    public function findOneBySomeField($value): ?Album
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
