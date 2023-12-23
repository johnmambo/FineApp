<?php

namespace App\Livewire\Admin\Lecturers;

use Livewire\Component;
use App\Models\Lecturer;

class Create extends Component
{
    public $lec_name;

    public function render()
    {
        return view('livewire.admin.lecturers.create');
    }

    public function saveLecturer() {
        $this->validate([
            'lec_name'=>'required',
        ]);

        // dd($this->all());

        $new = new Lecturer;
        $new->lec_name = $this->lec_name;

        $new->save();


        return to_route ('admin.showLecturers')->with('success', 'Lecturer Added successfully');
    }
}
