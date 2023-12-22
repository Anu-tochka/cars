<?php

namespace App\Repository;

use App\Entity\Cars;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cars>
 *
 * @method Cars|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cars|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cars[]    findAll()
 * @method Cars[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cars::class);
    }

    /**
     * @return Cars[] Returns an array of Cars objects
     */
    public function findAllCars(): array
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT c.id as carID, b.id as brandID, c.photo, c.price, b.name
            FROM App\Entity\Cars c
			JOIN c.brands b'
        );
        return $query->getResult();
    }

    public function findAllCars($id): array
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT c.photo, c.price, b.id as brandID, m.id as modelID, 
			b.name as brandName, m.name as modelName
            FROM App\Entity\Cars c
			JOIN c.brands b 
			JOIN c.models m 
			WHERE c.id = :id'
        ) 
		->setParameter('id', $id);
        return $query->getResult();
    }

//    public function findOneBySomeField($value): ?Cars
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
