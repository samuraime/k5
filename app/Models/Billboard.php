<?php namespace App\Models;

use Eloquent;

class Billboard extends Eloquent
{
    protected $table = 'billboard';
    protected $guarded = ['id', 'author', 'editor', 'created_at', 'updated_at'];
}
