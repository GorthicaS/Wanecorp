<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'banner_image'];

    public function members()
    {
        return $this->hasMany(TeamMember::class);
    }
}

