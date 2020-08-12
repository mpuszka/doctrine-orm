<?php
declare(strict_types=1);

namespace App;

use \Bramus\Router\Router;

/**
 * Route class
 */
class Route
{   
    /**
     * Router property
     *
     * @var object
     */
    private $router;

    /**
     * Constructor
     */
    public function __construct() 
    {
        $this->router = new Router;;
    }

    /**
     * Get router instance
     *
     * @return object
     */
    public function getRouter(): object
    {
        return $this->router;
    }

    /**
     * Run router
     *
     * @return void
     */
    public function runRouter(): void 
    {
        $this->router->run();
    }
}