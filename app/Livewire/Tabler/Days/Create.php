<?php

namespace App\Livewire\Tabler\Days;

use App\Models\Day;
use Livewire\Component;

class Create extends Component
{
    public $day_name;

    public function render()
    {
        return view('livewire.tabler.days.create');
    }

    public function saveday(){


        $this->validate([
            'day_name'=>'required',
        ]);

        // dd($this->all());

        $new = new Day;
        $new->day_name = $this->day_name;

        $new->save();


        return to_route ('tabler.showDays')->with('success', 'Day Saved successfully');

    }
}
