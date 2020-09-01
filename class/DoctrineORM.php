<?php
declare(strict_types=1);

namespace App;

use App\Config;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
 * DoctrineORM class
 */
class DoctrineORM
{
    /**
     * Constans path to entites
     */
    private const ENTITIES_PATH = ['../class/Entity'];

    /**
     * Database parameters
     *
     * @var array
     */
    private $dbParams;

    /**
     * Config
     *
     * @var object
     */
    private $config;

    /**
     * Entity manager
     *
     * @var object
     */
    private $entityManager;

    /**
     * Path to entities
     *
     * @var array
     */
    private $paths = self::ENTITIES_PATH;

    /**
     * Develop mode
     *
     * @var boolean
     */
    private $isDevMode = false;

    /**
     * Constructor
     */
    public function __construct() 
    {   
        $this->dbParams         = Config::getInstance()->getDb();
        $this->config           = Setup::createAnnotationMetadataConfiguration($this->paths, $this->isDevMode);
        $this->entityManager    = EntityManager::create($this->dbParams, $this->config);
    }

    /**
     * Get Entity manager instance
     *
     * @return object
     */
    public function getEntityManager(): object 
    {
        return $this->entityManager;
    }
}