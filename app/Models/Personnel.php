<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $table = 'personnel';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
