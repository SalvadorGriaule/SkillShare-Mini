<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSkillWanted extends Model
{
    protected $fillable = ["user_id","skill_id"];

    public $timestamps = false;
}
