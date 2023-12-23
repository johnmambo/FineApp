<?php

namespace App\Livewire\Tabler\Timeslots;

use App\Models\Day;
use Livewire\Component;
use App\Models\Timeslot;

class Create extends Component
{
    public $day_id;
    public $start_time;
    public $end_time;

    public function render()
    {
        $days = Day::get();
        return view('livewire.tabler.timeslots.create', compact('days'));
    }


    public function savetimeslot(){


        $this->validate([
            'day_id'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',

        ]);

        // dd($this->all());

        $new = new Timeslot;
        $new->day_id = $this->day_id;
        $new->start_time = $this->start_time;
        $new->end_time = $this->end_time;

        $new->save();


        return to_route ('tabler.showTimeslots')->with('success', 'Timeslot Saved successfully');

    }
}
