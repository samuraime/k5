<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billboard extends Model
{
    protected $table = 'billboard';
    protected $guarded = ['id', 'author', 'editor', 'created_at', 'updated_at'];
}
