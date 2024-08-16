<?php

// src/Repository/HomeRepository.php
namespace App\Repository;

use App\Entity\Home;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class HomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Home::class);
    }

    public function findAllHomes(): array
    {

        return $this->findAll();
    }

}
