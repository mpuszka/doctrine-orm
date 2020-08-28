<?php
declare(strict_types=1);

namespace App;

use App\DoctrineORM;
use App\Entity\Article;
use App\Entity\Comment;
use App\Redirect;

class CommentController
{
    private $doctrine;

    public function __construct()
    {
        $this->doctrine = new DoctrineORM;
    }

    public function getAdd(int $id): void
    {
        require '../template/add_edit.php';
    }

    public function postAdd(int $id): void
    {
        if (false === $this->checkRequest($_POST)) {
            Redirect::redirect('/');
        }

        $article = $this->getArticle($id);

        $title  = $_POST['title'];
        $body   = $_POST['body'];

        $comment = new Comment;
        $comment->setTitle($title);
        $comment->setBody($body);
        $comment->setCreatedDate(new \DateTime);

        $article->setComment($comment);
        $comment->setArticle($article);

        $this->doctrine->getEntityManager()->persist($comment);
        $this->doctrine->getEntityManager()->flush();

        Redirect::redirect('/article/' . $id);

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
}