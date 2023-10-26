<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    protected $fillable = [
        'name',
        'description',
        'likes',
        'play_count',
        'image_link',
        'type', // Add this line for the new field
    ];

}


