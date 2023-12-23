<?php

namespace App\Livewire\Tabler\Days;

use App\Models\Day;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        $days = Day::get();

        return view('livewire.tabler.days.show', compact('days'));
    }
}
