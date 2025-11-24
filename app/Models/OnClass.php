<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnClass extends Model
{
    protected $table = 'on_classes';
    protected $fillable = ['name', 'grade', 'link', 'instructor', 'mode', 'start_date', 'start_time', 'status'];

    public function lessons()
    {
        return $this->hasMany(Lessons::class);
    }
}
