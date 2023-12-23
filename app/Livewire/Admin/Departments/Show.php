<?php

namespace App\Livewire\Admin\Departments;

use Livewire\Component;
use App\Models\Department;

class Show extends Component
{
    public function render()
    {

        $departments= Department::all();
        return view('livewire.admin.departments.show', compact('departments'));
    }

   
}
