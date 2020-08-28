<?php
declare(strict_types=1);

namespace App;

use App\DoctrineORM;
use App\Entity\Article;
use App\Entity\Comment;
use App\Redirect;
use App\Traits\ArticleTrait;
use App\Traits\RequestTrait;

class CommentController
{
    use ArticleTrait, RequestTrait;

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
}