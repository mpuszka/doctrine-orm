<?php
declare(strict_types=1);

use App\ArticleController;

$router->get('/', function() {
    $articles = new ArticleController;
    $articles->index();
});