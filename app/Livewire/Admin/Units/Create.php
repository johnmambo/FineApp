<?php

namespace App\Livewire\Admin\Units;

use App\Models\Unit;
use App\Models\Course;
use Livewire\Component;

class Create extends Component
{
    public $unit_name;
    public $unit_code;
    public $course_id;

    public function render()
    {

        $courses = Course::get();

        return view('livewire.admin.units.create', compact('courses'));
    }


    public function saveUnit() {
        $this->validate([
            'unit_name'=>'required',
            'unit_code'=>'required',
            'course_id'=>'required',

        ]);
        // dd($this->all());
        $new = new Unit;
        $new->unit_name = $this->unit_name;
        $new->unit_code = $this->unit_code;
        $new->course_id =$this->course_id;

        $new->save();


        return to_route ('admin.showUnits')->with('success', 'Unit Added successfully');


    }
}
