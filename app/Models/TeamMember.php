<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = ['name', 'role', 'photo', 'pseudo', 'team_id'];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}

