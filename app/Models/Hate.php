<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Hate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hated'
    ];

    protected $casts = [
        'hated' => 'boolean'
    ];
}
