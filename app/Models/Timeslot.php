<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    use HasFactory;

    protected $table = 'timeslots';

    public function days() {
        return $this->belongsTo(Day::class, 'day_id', 'id');
    }

    public function timetables() {
        return $this->hasMany(Timetable::class, 'timeslot_id');
    }
}
