<?php

namespace App\Livewire\Tabler\Timeslots;

use Livewire\Component;
use App\Models\Timeslot;

class Show extends Component
{
    public function render()
    {

        $slots = Timeslot::get();
        
        return view('livewire.tabler.timeslots.show', compact('slots'));
    }
}
