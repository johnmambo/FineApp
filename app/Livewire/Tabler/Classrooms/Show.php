<?php

namespace App\Livewire\Tabler\Classrooms;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Classroom;

class Show extends Component
{
    public function render()
    {
        $classrooms = Classroom::all();

        return view('livewire.tabler.classrooms.show', compact('classrooms'));
    }
}
