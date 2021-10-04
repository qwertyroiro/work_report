<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        "user_id", "classroom_id", "from", "to", "price"
    ];
}
