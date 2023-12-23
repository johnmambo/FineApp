<?php

namespace App\Livewire\Tabler\Timetables;

use App\Models\Day;
use App\Models\Unit;
use App\Models\Course;
use Livewire\Component;
use App\Models\Timeslot;
use App\Models\Classroom;
use App\Models\Timetable;


class Create extends Component
{


    public $classroom_id;
    public $day_id;
    public $timeslot_id;
    public $courses_id;
    public $unit_id;

 

    public function savetimetable(){

        $this->validate([
            'classroom_id'=>'required',
            'day_id'=>'required',
            'timeslot_id'=>'required',
            'courses_id'=>'required',
            'unit_id'=>'required',
        ]);

        dd($this->all());

        $new = new Timetable;
        $new->classroom_id = $this->classroom_id;
        $new->day_id = $this->day_id;
        $new->timeslot_id = $this->timeslot_id;
        $new->courses_id =$this->courses_id;
        $new->unit_id = $this->unit_id;
        $new->save();

        return to_route ('showTimetables')->with('success', 'Schedule Added successfully');

    }

    public function render()
    {
        $classes = Classroom::all();
        $days = Day::all();

        return view('livewire.tabler.timetables.create', compact('classes', 'days'));

    }
}
