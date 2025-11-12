<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnClass extends Model
{
    protected $table = 'on_class';
    protected $fillable = ['name', 'grade', 'link', 'instructor', 'mode', 'start_date', 'start_time', 'status'];
}
