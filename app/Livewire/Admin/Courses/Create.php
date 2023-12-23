<?php

namespace App\Livewire\Admin\Courses;

use App\Models\Course;
use Livewire\Component;
use App\Models\Department;

class Create extends Component
{
    #[Rule('required')]
    public $course_name;

    #[Rule('required')]
    public $course_code;

    #[Rule('required')]
    public $course_capacity;

    #[Rule('required')]
    public $course_type;

    #[Rule('required')]
    public $department_id;

    public function render()
    {
        $departments = Department::all();

        return view('livewire.admin.courses.create', compact('departments'));
    }

    public function savecourse(){


        $this->validate([
            'course_name'=>'required',
            'course_code'=>'required',
            'course_capacity'=>'required',
            'course_type'=>'required',
            'department_id'=>'required',
        ]);



        $new = new Course;
        $new->course_name = $this->course_name;
        $new->course_code = $this->course_code;
        $new->course_capacity =$this->course_capacity;
        $new->course_type = $this->course_type;
        $new->department_id = $this->department_id;
        $new->save();


        return to_route ('admin.showCourses')->with('success', 'Course Added successfully');

    }
}
