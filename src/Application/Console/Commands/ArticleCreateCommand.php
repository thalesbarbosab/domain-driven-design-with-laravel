<?php

namespace App\Application\Console\Commands;

use App\Infrastructure\Laravel\Models\Article;
use Illuminate\Console\Command;

class ArticleCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to create a new article in storage';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $article = [];
        $article['title'] = $this->ask('Enter the "Title" (required)');
        if(empty($article['title'])){
            $this->error('Title is required');
            return;
        }
        $article['description'] = $this->ask('Enter the "Description" (required)');
        if(empty($article['description'])){
            $this->error('Description is required');
            return;
        }
        $article['reading_time'] = $this->ask('Enter the "Reading time (in minutes)" (optional)', 1);
        if(!empty($article['reading_time']) && !is_int(intval($article['reading_time']))){
            $this->error('Reading time must be an integer value');
            return;
        }
        $article['author'] = $this->ask('Enter the "Author (name)" (required)');
        if(empty($article['author'])){
            $this->error('Author is required');
            return;
        }
        Article::create([
            'title' => $article['title'],
            'description' => $article['description'],
            'reading_time' => $article['reading_time'],
            'author' => $article['author']
        ]);
        $this->info('Article created successfuly!');
        $this->newLine();
        $this->info('Showing bellow all articles:');
        $columns_to_show = ['id','title','description','reading_time','author','created_at'];
        $this->table(
            $columns_to_show,
            Article::all($columns_to_show)->toArray()
        );

    }
}
