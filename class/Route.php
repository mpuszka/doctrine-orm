<?php
declare(strict_types=1);

namespace App;

use \Bramus\Router\Router;

class Route
{
    private $router;

    public function __construct() 
    {
        $this->router = new Router;;
    }

    public function getRouter() 
    {
        return $this->router;
    }

    public function runRouter() {
        $this->router->run();
    }
}