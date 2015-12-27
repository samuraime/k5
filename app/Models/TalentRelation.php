<?php namespace App\Models;

use Eloquent;

class TalentRelation extends Eloquent
{
    protected $table = 'talent_relation';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
