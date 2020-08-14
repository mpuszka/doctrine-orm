<?php
declare(strict_types=1);

include '../vendor/autoload.php';

use App\Route;
use App\DoctrineORM;

$route  = new Route;
$router = $route->getRouter();

require 'config/routes.php';

$route->runRouter();

$doctrine = new DoctrineORM;
