<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
    protected $table = 'talent';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
