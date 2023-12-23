<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:student']);
    }
    public function checkauth()
    {
        $user = auth()->user();
        return $user;
    }

    public function dashboard() {
        return view('student.dashboard');
    }
}
