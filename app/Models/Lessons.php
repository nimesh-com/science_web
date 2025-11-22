<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    protected $table = 'lessons';
    protected $fillable = ['name', 'on_class_id','slug', 'expiration_date', 'status'];

    public function on_class()
    {
        return $this->belongsTo(OnClass::class);
    }
}
