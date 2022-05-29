<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function hates()
    {
        return $this->hasMany(Hate::class);
    }

    public function hasLiked()
    {
        return $this->likes()->where('user_id', Auth::user()->id)->exists();
    }

    public function hasHated()
    {
        return $this->hates()->where('user_id', Auth::user()->id)->exists();
    }
}
