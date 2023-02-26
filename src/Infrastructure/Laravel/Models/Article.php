<?php

namespace App\Infrastructure\Laravel\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $fillable = ['title','description','reading_time','author'];
}
