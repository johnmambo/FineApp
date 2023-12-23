<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }
    public function checkauth()
    {
        $user = auth()->user();
        return $user;
    }


    public function dashboard() {

        return view('admin.dashboard');
    }

    public function showDepartments() {
        return view('admin.departments.show');
    }

    public function createDepartment() {
        return view('admin.departments.create');
    }


    public function showCourses() {
        return view('admin.courses.show');
    }

    public function createCourse(){

        return view('admin.courses.create');
    }

    public function showUnits() {
        return view('admin.units.show');
    }

    public function createUnit() {

        return view('admin.units.create');
    }

    public function showLecturers() {

        return view('admin.lecturers.show');
    }

    public function createLecturer() {

        return view('admin.lecturers.create');
    }
}
