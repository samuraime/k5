<?php namespace App\Models;

use Eloquent;

class TalentOffice extends Eloquent
{
    protected $table = 'talent_office';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
