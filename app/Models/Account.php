<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';
    protected $guarded = ['id', 'password', 'permission', 'created_at', 'updated_at'];
}
