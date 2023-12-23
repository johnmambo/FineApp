<?php

namespace App\Livewire\Admin\Departments;

use Livewire\Component;
use App\Models\Department;

class Create extends Component
{
    public $dep_name;
    public $dep_code;

    public function savedepartment(){


        $this->validate([
            'dep_name'=>'required',
            'dep_code'=>'required',
        ]);

        // dd($this->all());

        $new = new Department;
        $new->dep_name = $this->dep_name;
        $new->dep_code = $this->dep_code;

        $new->save();


        return to_route ('admin.showDepartments')->with('success', 'Department Added successfully');
        
    }

    public function render()
    {
        return view('livewire.admin.departments.create');
    }
}
