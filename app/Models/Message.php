<?php namespace App\Models;

use Eloquent;

class Message extends Eloquent
{
    protected $table = 'message';
    protected $fillable = ['title', 'content', 'type', 'name', 'mobile', 'email', 'content'];
}
