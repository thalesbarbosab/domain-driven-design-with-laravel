<?php

namespace App\Infrastructure\Laravel\Repositories;

use Illuminate\Support\Collection;

use App\Domain\Article\Repositories\ArticleRepository as ArticleRepositoryInterface;
use App\Infrastructure\Laravel\Models\Article;

class ArticleEloquentRepository implements ArticleRepositoryInterface
{
    public function all(array $columns = ['*']) : Collection
    {
        return Article::all($columns);
    }

    public function create(array $article) : void
    {
        Article::create($article);
    }
}
