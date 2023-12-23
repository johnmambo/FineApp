<?php

namespace App\Livewire\Admin\Departments;

use Livewire\Component;
use App\Models\Department;

class View extends Component
{
    public $department;
    
    public function render()
    {

        $department = Department::findOrFail($id);

        return view('livewire.admin.departments.view', compact('department'));
    }
}
