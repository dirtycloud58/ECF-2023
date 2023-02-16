<?php

namespace App\Repository;

use App\Entity\Allergy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Allergy>
 *
 * @method Allergy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Allergy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Allergy[]    findAll()
 * @method Allergy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AllergyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Allergy::class);
    }

    public function save(Allergy $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Allergy $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Allergy[] Returns an array of Allergy objects
     */
    public function findByAllergy()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
