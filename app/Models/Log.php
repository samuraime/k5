<?php namespace App\Models;

use Eloquent;

class Log extends Eloquent
{
    protected $table = 'log';
    protected $guarded = ['id', 'author', 'editor', 'created_at', 'updated_at'];
}
