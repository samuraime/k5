<?php namespace App\Models;

use Eloquent;

class Account extends Eloquent
{
    protected $table = 'account';
    protected $guarded = ['id', 'password', 'permission', 'created_at', 'updated_at'];
}
