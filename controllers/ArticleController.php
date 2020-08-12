<?php
declare(strict_types=1);

namespace App;

use App\DoctrineORM;
use App\Entity\Article;

class ArticleController 
{   
    private $doctrine;

    public function __construct() 
    {
        $this->doctrine = new DoctrineORM([
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => '2wepRawa',
            'dbname'   => 'doctrineORM',
        ], ['../class/Entity']);
    }

    public function index(): void
    {   
        $articles = $this->doctrine
                            ->getEntityManager()
                            ->getRepository(Article::class)
                            ->findBy([]);                          

        require '../template/articles.php';
    }

    public function article(int $id): void
    {
        $article = $this->doctrine
                            ->getEntityManager()
                            ->getRepository(Article::class)
                            ->find($id);  
        
        if (!isset($article) || empty($article)) 
        {
            header("Location: /", true, 301);
            exit();
        }
        
                            
        require '../template/article.php';
    }
}