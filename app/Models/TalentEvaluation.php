<?php namespace App\Models;

use Eloquent;

class TalentEvaluation extends Eloquent
{
    protected $table = 'talent_evaluation';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
