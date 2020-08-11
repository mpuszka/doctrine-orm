<?php
declare(strict_types=1);

namespace App;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DoctrineORM
{
    private $paths;
    private $isDevMode = false;
    private $dbParams;
    private $config;
    private $entityManager;

    public function __construct(array $config, array $paths) 
    {   
        $this->paths            = $paths;
        $this->dbParams         = $config;
        $this->config           = Setup::createAnnotationMetadataConfiguration($this->paths, $this->isDevMode);
        $this->entityManager    = EntityManager::create($this->dbParams, $this->config);
    }

    public function getEntityManager(): object 
    {
        return $this->entityManager;
    }
}