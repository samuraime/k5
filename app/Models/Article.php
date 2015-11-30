<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $guarded = ['id', 'author', 'editor', 'created_at', 'updated_at'];
}
