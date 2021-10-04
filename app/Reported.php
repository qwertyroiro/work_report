<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reported extends Model
{
    protected $fillable = [
        "month", "day", "teacher", "DAC",
        "classroom", "absence", "delay", "report"
    ];
}
