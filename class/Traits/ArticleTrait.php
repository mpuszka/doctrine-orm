<?php
declare(strict_types=1);

namespace App\Traits;

use App\Redirect;
use App\Entity\Article;

Trait ArticleTrait
{
    /**
     * Get article
     * @param int $id
     * @return object|null
     */
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