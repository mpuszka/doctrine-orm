<?php
declare(strict_types=1);

$router->setNamespace('\App');

$router->get('/', 'ArticleController@index');
$router->get('/article/(\d+)', 'ArticleController@article');
$router->get('/article/edit/(\d+)', 'ArticleController@getEdit');
$router->post('/article/edit/(\d+)', 'ArticleController@postEdit');
