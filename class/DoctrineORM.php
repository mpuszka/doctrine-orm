<?php
declare(strict_types=1);

namespace App;

use App\Config;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DoctrineORM
{
    private $dbParams;
    private $config;
    private $entityManager;
    private $paths      = ['../class/Entity'];
    private $isDevMode  = false;

    public function __construct() 
    {   
        $this->dbParams         = Config::getInstance()->getDb();
        $this->config           = Setup::createAnnotationMetadataConfiguration($this->paths, $this->isDevMode);
        $this->entityManager    = EntityManager::create($this->dbParams, $this->config);
    }

    public function getEntityManager(): object 
    {
        return $this->entityManager;
    }
}