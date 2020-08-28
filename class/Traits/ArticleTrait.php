<?php
declare(strict_types=1);

namespace App\Traits;

use App\Entity\Article;

Trait ArticleTrait
{
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