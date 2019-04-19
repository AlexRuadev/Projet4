<?php
namespace App\Repository;
use App\Entity\Bracelet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
/**
 * @method Bracelet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bracelet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bracelet[]    findAll()
 * @method Bracelet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BraceletRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bracelet::class);
    }
    // /**
    //  * @return Bracelet[] Returns an array of Bracelet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
    /*
    public function findOneBySomeField($value): ?Bracelet
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
