<?php

namespace App\Livewire\Admin\Lecturers;

use Livewire\Component;
use App\Models\Lecturer;

class Show extends Component
{
    public function render()
    {
        $lecturers = Lecturer::all();

        return view('livewire.admin.lecturers.show', compact('lecturers'));
    }
}
