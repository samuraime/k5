<?php namespace App\Models;

use Eloquent;

class TalentProject extends Eloquent
{
    protected $table = 'talent_project';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
