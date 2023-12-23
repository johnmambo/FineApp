<div>
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Scheduled Timetable</h5>
                    <a class="btn btn-sm btn-primary" href="{{ route('tabler.createTimetable') }}"><i class="align-inline"
                            data-feather="edit"></i>Add Schedule</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Day</th>
                            <th>Timeslot</th>
                            @foreach ($classroomIds as $classroomId)
                                @php
                                    $classroom = App\Models\Classroom::find($classroomId);
                                @endphp
                                <th>{{ $classroom->room_name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($timetableData as $dayData)
                                    @php
                                        // Group by timeslot_id
                                        $groupedTimeslots = $dayData['timeslots']->groupBy('timeslot_id');
                                    @endphp

                                    @foreach ($groupedTimeslots as $timeslotId => $timeslots)
                                        <tr>

                                            <td>
                                                @if (isset($timeslots[0]['day']['day_name']))
                                                    {{ $timeslots[0]['day']['day_name'] }}
                                                @endif
                                            </td>
                                            <td>
                                                @if (isset($timeslots[0]['timeslot']['start_time']))
                                                    {{ $timeslots[0]['timeslot']['start_time'] }} -
                                                @endif
                                                @if (isset($timeslots[0]['timeslot']['end_time']))
                                                    {{ $timeslots[0]['timeslot']['end_time'] }}
                                                @endif
                                            </td>
                                            @foreach ($classroomIds as $classroomId)
                                                <td>
                                                    @foreach ($timeslots as $timeslot)
                                                        @if ($timeslot->classroom_id == $classroomId)
                                                            {{ $timeslot->course->course_code }}</br>
                                                            {{ $timeslot->unit->unit_code }}</br>
                                                            {{ $timeslot->unit->unit_lecturer->name }}
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>
