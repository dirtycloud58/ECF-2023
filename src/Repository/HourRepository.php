<?php

namespace App\Repository;

use App\Entity\Hour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Hour>
 *
 * @method Hour|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hour|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hour[]    findAll()
 * @method Hour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hour::class);
    }

    public function save(Hour $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Hour $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Hour[] Returns an array of Hour objects
     */
    public function findByHour()
    {

        return $this->createQueryBuilder('h')
            ->orderBy('h.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
