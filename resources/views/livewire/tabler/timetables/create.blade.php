@if ($errors->has('conflict'))
    <div class="alert alert-danger">
        {{ $errors->first('conflict') }}
    </div>
@endif
<div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Schedule Lesson</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="savetimetable">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{ __('Select Classroom') }}</label>
                    <select wire:model="classroom_id" class="form-control" >
                        <option selected>Open to select classroom</option>
                        @foreach ($classes as $classroom)
                        <option value="{{ $classroom->id }}"> {{ $classroom->room_name }} -
                            Capacity - {{ $classroom->room_capacity }} Students </option>
                        @endforeach
                    </select>
                    @error('classroom_id')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Select Day') }}</label>
                    <select wire:model="day_id" class="form-control" name="day_id">
                        <option selected>Open to select Day</option>
                        @foreach ($days as $day)
                        <option class="text-primary" value="{{ $day->id }}">
                            {{ $day->day_name }}</option>
                    @endforeach
                    </select>
                    @error('day_id')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Select Timeslot') }}</label>
                    <select wire:model="timeslot_id" class="form-control" name="timeslot_id">
                        <option selected>Open to select Timeslot</option>
                        @if ($day_id && $classroom_id)
                            @php
                                // Fetch assigned timeslots for the selected classroom
                                $assignedTimelines = \App\Models\Timetable::where('classroom_id', $classroom_id)->pluck('timeslot_id');

                                // Retrieve available timeslots for the given day and classroom
                                $availableTimelines = \App\Models\Timeslot::where('day_id', $day_id)
                                    ->whereNotIn('id', $assignedTimelines)
                                    ->select('start_time as lesson_start', 'end_time as lesson_end', 'id')
                                    ->get();
                            @endphp

                            <select wire:model="availableTimelines" wire:key="timeslots">
                                <option value="">Select a Timeslot</option>
                                @foreach ($availableTimelines as $timeline)
                                    <option value="{{ $timeline->id }}">
                                        {{ $timeline->lesson_start }} - {{ $timeline->lesson_end }}
                                    </option>
                                @endforeach
                            </select>
                        @endif


                    </select>
                    @error('timeslot_id')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Select Course') }}</label>
                    <select wire:model="courses_id" class="form-control" name="courses_id">
                        <option selected>Open to select course</option>
                        @if ($classroom_id && $day_id && $timeslot_id)
                            @php
                                // Get the assigned courses in the current timeslot and day
                                $assignedCourses = App\Models\Timetable::where('day_id', $day_id)
                                    ->where('timeslot_id', $timeslot_id)
                                    ->pluck('courses_id');

                                // Get the courses assigned in more than one timeslot of the same day
                                $coursesAssignedMultipleTimes = App\Models\Timetable::where('day_id', $day_id)
                                    ->groupBy('courses_id')
                                    ->havingRaw('COUNT(DISTINCT timeslot_id) >= 2')
                                    ->pluck('courses_id');

                                // Exclude courses assigned in more than one timeslot and those assigned in the current timeslot
                                $class = App\Models\Classroom::find($classroom_id);
                                $courses = App\Models\Course::where('course_capacity', '<=', $class->room_capacity)
                                    ->whereNotIn('id', $assignedCourses)
                                    ->whereNotIn('id', $coursesAssignedMultipleTimes)
                                    ->get();
                            @endphp

                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course_code }} -
                                    {{ $course->course_name }}</option>
                            @endforeach

                    @endif
                    </select>
                    @error('courses_id')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Select Unit') }}</label>
                    <select wire:model="unit_id" class="form-control" name="unit_id">
                        <option selected>Open to select unit</option>
                        @if ($courses_id && $classroom_id && $day_id && $timeslot_id)
                            @php
                                $assignedUnitsAll = App\Models\Timetable::where('courses_id', $courses_id)->pluck('unit_id');

                                // Fetch all units of the specific course that have not been assigned to any timeslot
                                $availableUnits = App\Models\Unit::where('course_id', $courses_id)
                                    ->whereNotIn('id', $assignedUnitsAll)
                                    ->select('lecturer_id', 'unit_code', 'id', 'unit_name')
                                    ->get();
                            @endphp

                            @foreach ($availableUnits as $unit)
                                <option value="{{ $unit->id }}">
                                    {{ $unit->unit_code }} - {{ $unit->unit_name }} - Lec -
                                    {{ $unit->unit_lecturer->name }} -
                                    ({{ $unit->unit_lecturer->email }})
                                </option>
                            @endforeach
                        @endif
                    </select>
                    @error('unit_id')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class=" mt-5 btn btn-primary">save</button>
            </form>
        </div>
    </div>
</div>

