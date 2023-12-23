<?php

namespace App\Livewire\Admin\Units;

use App\Models\Unit;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        $units = Unit::all();

        return view('livewire.admin.units.show', compact('units'));
    }
}
