<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{
    protected $fillable = [
        "label"
    ];

    public function listUserWanted(): BelongsToMany
    {
        return $this->belongsToMany(User::class,"user_skill_wanteds");
    }

     public function listUserOffered(): BelongsToMany
    {
        return $this->belongsToMany(User::class,"user_skill_offereds");
    }
}
