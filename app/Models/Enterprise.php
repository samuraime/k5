<?php namespace App\Models;

use Eloquent;

class Enterprise extends Eloquent
{
    protected $table = 'enterprise';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
