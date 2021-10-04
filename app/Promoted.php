<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promoted extends Model
{
    protected $fillable = [
        "classroom", "student", "month", "day", "rank", "teacher"
    ];
}
