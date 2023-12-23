<?php

namespace App\Livewire\Tabler\Timetables;

use Livewire\Component;
use App\Models\Timetable;

class Show extends Component
{
    public function render()
    {
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

        return view('livewire.tabler.timetables.show', compact('timetableData', 'classroomIds'));
    }
}
