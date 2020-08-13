<?php
declare(strict_types=1);

$router->setNamespace('\App');

$router->get('/', 'ArticleController@index');
$router->get('/article/(\d+)', 'ArticleController@article');
$router->get('/article/edit/(\d+)', 'ArticleController@getEdit');
$router->post('/article/edit/(\d+)', 'ArticleController@postEdit');
$router->get('/article/add', 'ArticleController@getAdd');
$router->post('/article/add', 'ArticleController@postAdd');
