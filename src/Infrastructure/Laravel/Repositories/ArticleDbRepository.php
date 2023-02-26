<?php

namespace App\Infrastructure\Laravel\Repositories;

use Illuminate\Support\Collection;

use App\Domain\Article\Repositories\ArticleRepository as ArticleRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ArticleDbRepository implements ArticleRepositoryInterface
{
    public function all(array $columns = ['*']) : Collection
    {
        return DB::table('articles')->get($columns)->map(fn ($row) => get_object_vars($row));
    }

    public function create(array $article) : void
    {
        DB::transaction(function () use ($article) {
            $article['created_at'] = now()->format('Y-m-d H:i:s');
            $article['updated_at'] = now()->format('Y-m-d H:i:s');
            DB::table("articles")->insert($article);
            DB::commit();
        });
    }
}
