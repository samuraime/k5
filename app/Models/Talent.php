<?php namespace App\Models;

use Eloquent;

class Talent extends Eloquent
{
    protected $table = 'talent';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
