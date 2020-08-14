<?php
declare(strict_types=1);

namespace App;

use App\DoctrineORM;
use App\Entity\Article;
use App\Redirect;

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
                            ->findBy([], ['created_date' => 'DESC']);                          

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
                      
        require '../template/add_edit.php';
    }

    public function postEdit(int $id): void 
    {   
        if (false === $this->checkRequest($_POST)) {
            Redirect::redirect('/article/edit/', $id);
        }

        $article = $this->getArticle($id);
        
        $title  = $_POST['title'];
        $body   = $_POST['body'];

        $article->setTitle($title);
        $article->setBody($body);
        $article->setUpdatedDate((new \DateTime));

        $this->doctrine->getEntityManager()->persist($article);
        $this->doctrine->getEntityManager()->flush();

        Redirect::redirect('/', $id);
    }

    private function getArticle(int $id): ?object 
    {
        $article = $this->doctrine
                            ->getEntityManager()
                            ->getRepository(Article::class)
                            ->find($id); 

        if (!isset($article) || empty($article)) 
        {
            Redirect::redirect('/');
        }

        return $article;
    }

    public function getAdd(): void 
    {
        require '../template/add_edit.php';
    }

    public function postAdd(): void 
    {   
        if (false === $this->checkRequest($_POST)) {
            Redirect::redirect('/');
        }

        $article = new Article;

        $title  = $_POST['title'];
        $body   = $_POST['body'];

        $article->setTitle($title);
        $article->setBody($body);
        $article->setCreatedDate((new \DateTime));

        $this->doctrine->getEntityManager()->persist($article);
        $this->doctrine->getEntityManager()->flush();

        Redirect::redirect('/');
    }

    private function checkRequest(array $request): bool
    {
        $title  = trim($request['title']);
        $body   = trim($request['body']);

        if (empty($title)) {
            return false;
        }

        if (empty($body)) {
            return false;
        }

        return true;
    }
}