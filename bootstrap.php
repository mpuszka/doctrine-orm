<?php
declare(strict_types=1);

include '../vendor/autoload.php';

use App\Route;

$route  = new Route;
$router = $route->getRouter();

require 'config/settings.php';
require 'config/routes.php';

$route->runRouter();
