<?php

namespace App\Repository;

use App\Entity\Progression;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Progression|null find($id, $lockMode = null, $lockVersion = null)
 * @method Progression|null findOneBy(array $criteria, array $orderBy = null)
 * @method Progression[]    findAll()
 * @method Progression[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProgressionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Progression::class);
    }

     /**
     * @return Progression[] Returns an array of Progression objects
     */
    
    /*public function findByExampleField($value)
    {
        return $this->createQueryBuilder('pg')
            ->andWhere('progression.matieres = :val')
            ->setParameter('val', $matiere)
            ->orderBy('progression.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }*/
    // public function countNumberPrintedForMatieres(Matieres $matieres)
    // {
    //     return $this->createQueryBuilder('pg')
    //     ->andWhere('pg.matieres = :matieres')
    //     ->setParameter('matieres', $matieres)
    //     ->select('SUM(pg.numberPrinted) as progressionsPrinted')
    //     ->orderBy('pg.id', 'ASC')
    //     ->setMaxResults(10)
    //     ->getQuery()
    //     ->getResult()
    // ;
    // }
    /*
    public function findOneBySomeField($value): ?Progression
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function stat()
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "select e.nom as enseignant, m.libelle as nom_matiere, s.libelle as libelle_specialite, m.quota, SUM(p.duree) as number_printed from enseignant e, progression p, matiere m, specialite_matiere sm, specialite s where e.id = p.enseignants_id and p.matieres_id=m.id and m.id = sm.matiere_id and sm.specialite_id=s.id group by p.enseignants_id, p.matieres_id, sm.specialite_id;";
        $query = $conn->prepare($sql);
        $query->execute();

        return ($query->fetchAll());
    }
}
