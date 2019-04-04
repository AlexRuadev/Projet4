<?php
namespace App\Repository;
use App\Entity\Medical;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
/**
 * @method Medical|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medical|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medical[]    findAll()
 * @method Medical[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicalRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Medical::class);
    }
    // /**
    //  * @return Medical[] Returns an array of Medical objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
    /*
    public function findOneBySomeField($value): ?Medical
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
