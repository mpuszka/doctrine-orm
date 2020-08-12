<?php
declare(strict_types=1);

namespace App;

/**
 * Config class - singleton pattern
 */
class Config 
{   
    /**
     * Instance 
     *
     * @var object
     */
    private static $instance;

    /**
     * Config
     *
     * @var array
     */
    private $config = [
        'db' => [
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => '2wepRawa',
            'dbname'   => 'doctrineORM'
        ]
    ];
    
    /**
     * Constructor
     */
    private function __construct() {}

    /**
     * Clone
     *
     * @return void
     */
    private function __clone() {}
    
    /**
     * Get instance
     *
     * @return object
     */
    public static function getInstance(): object
    {
        if (null === self::$instance) 
        {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    /**
     * Get database config
     *
     * @return array
     */
    public function getDb(): array 
    {
        return $this->config["db"];
    }
}