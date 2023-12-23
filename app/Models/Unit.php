<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{

    use HasFactory;

    protected $table = 'units';

    public function timetables() {
        return $this->hasMany(Timetable::class, 'unit_id');
    }

    public function unit_lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id', 'id');
    }

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
