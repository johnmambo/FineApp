<?php

namespace App\Http\Controllers\Admin;

use App\Models\Timetable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TablerController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth', 'role:tabler']);
    }

    public function checkauth()
    {
        $user = auth()->user();
        return $user;
    }


    public function dashboard() {

        return view('tabler.dashboard');
    }

    public function showClassrooms() {

        return view('tabler.classrooms.show');
    }

    public function createClassroom() {

        return view('tabler.classrooms.create');
    }

    public function showDays() {

        return view('tabler.days.show');
    }

    public function createDay() {

        return view('tabler.days.create');
    }

    public function showTimeslots() {

        return view('tabler.timeslots.show');
    }

    public function createTimeslot() {

        return view('tabler.timeslots.create');
    }

    public function showTimetables() {

        $classroomIds = Timetable::select('classroom_id')->distinct()->pluck('classroom_id');


        $uniqueDays = Timetable::select('day_id')->distinct()->pluck('day_id');

        $timetableData = [];
        foreach ($uniqueDays as $day) {
            $dayData = [];

            // Fetch data for the current day
            $dayData['day_id'] = $day;
            $dayData['timeslots'] = Timetable::where('day_id', $day)->get();

            $timetableData[] = $dayData;
        }

        return view('tabler.timetables.show', compact('timetableData', 'classroomIds'));
    }

    public function createTimetable() {
        

        return view('tabler.timetables.create');
    }

}
