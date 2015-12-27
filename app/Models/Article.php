<?php namespace App\Models;

use Eloquent;

class Article extends Eloquent
{
    protected $table = 'article';
    protected $guarded = ['id', 'author', 'editor', 'created_at', 'updated_at'];
}
