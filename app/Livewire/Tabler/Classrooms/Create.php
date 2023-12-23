<?php

namespace App\Livewire\Tabler\Classrooms;

use Livewire\Component;
use App\Models\Classroom;

class Create extends Component
{
    public $room_name;
    public $room_type;
    public $room_capacity;

    public function render()
    {
        return view('livewire.tabler.classrooms.create');
    }

    public function saveclassroom(){


        $this->validate([
            'room_name'=>'required',
            'room_type'=>'required',
            'room_capacity'=>'required',
        ]);

// dd($this->all());

        $new = new Classroom;
        $new->room_name = $this->room_name;
        $new->room_type = $this->room_type;
        $new->room_capacity =$this->room_capacity;
        $new->save();


        return to_route ('tabler.showClassrooms')->with('success', 'Classroom Saved successfully');

    }
}
