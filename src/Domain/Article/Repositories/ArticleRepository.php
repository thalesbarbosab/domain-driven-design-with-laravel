<?php

namespace App\Domain\Article\Repositories;

interface ArticleRepository
{
    public function all();

    public function create(array $article);
}
