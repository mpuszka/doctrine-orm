<?php
declare(strict_types=1);

namespace App;

class ArticleController 
{
    public function index()
    {   
        
        require '../template/articles.php';
    }
}