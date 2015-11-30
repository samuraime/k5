<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'log';
    protected $guarded = ['id', 'author', 'editor', 'created_at', 'updated_at'];
}
