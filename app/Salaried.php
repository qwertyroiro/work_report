<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salaried extends Model
{
    protected $fillable = [
        "month", "day", "teacher", "mail", "classroom",
        "time1", "time2", "time3", "salary", "from", "to", "expenses"
    ];
}
