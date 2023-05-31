<?php

// app/Models/Streamer.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Streamer extends Model
{
    use HasFactory;

    protected $table = 'streamers'; 

    protected $fillable = [
        'name',
        'username',
        'avatar',
        'description',
        'online',
    ];
}


