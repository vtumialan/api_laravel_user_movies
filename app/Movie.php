<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['name', 'description', 'year', 'user_id'];

    protected $hidden = [
        'updated_at', 'created_at', 'user_id'
    ];
}
