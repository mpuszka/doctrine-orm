<?php
declare(strict_types=1);

$router->setNamespace('\App');
$router->get('/', 'ArticleController@index');