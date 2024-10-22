<?php

namespace App\Domain\Article\Repositories;

use Illuminate\Support\Collection;

interface ArticleRepository
{
    public function all(array $columns = ['*']) : Collection;

    public function create(array $article);
}
