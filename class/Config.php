<?php
declare(strict_types=1);

namespace App;

class Config 
{
    private static $instance;
    private $config = [
        'db' => [
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => '2wepRawa',
            'dbname'   => 'doctrineORM'
        ]
    ];
 
    private function __construct() {}
    private function __clone() {}
 
    public static function getInstance() 
    {
        if (null === self::$instance) 
        {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    public function getDb() 
    {
        return $this->config["db"];
    }
}