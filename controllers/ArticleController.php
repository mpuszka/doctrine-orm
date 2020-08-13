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
        $this->doctrine = new DoctrineORM;
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
        $article = $this->getArticle($id);
                            
        require '../template/article.php';
    }

    public function getEdit(int $id): void 
    {
        $article = $this->getArticle($id);
                      
        require '../template/edit.php';
    }

    public function postEdit(int $id): void 
    {
        $article = $this->getArticle($id);
        
        $title  = $_POST['title'];
        $body   = $_POST['body'];

        $article->setTitle($title);
        $article->setBody($body);
        $article->setUpdatedDate((new \DateTime));

        $this->doctrine->getEntityManager()->persist($article);
        $this->doctrine->getEntityManager()->flush();

        header("Location: /article/" . $id, true, 301);
        exit();
    }

    private function getArticle(int $id): ?object 
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

        return $article;
    }
}