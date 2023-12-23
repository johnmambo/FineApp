<?php

namespace App\Livewire\Admin\Courses;

use App\Models\Course;
use Livewire\Component;

class Show extends Component
{



    public function render()
    {
        $courses = Course::get();
        return view('livewire.admin.courses.show', compact('courses'));
    }
}
