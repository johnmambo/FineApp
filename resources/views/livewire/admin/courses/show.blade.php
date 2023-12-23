<div>
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Courses</h5>
                    <a class="btn btn-sm btn-primary"  href="{{ route('admin.createCourse') }}"><i class="align-inline"
                        data-feather="edit"></i>Add Course</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th style="width:30%;">Course Name</th>
                            <th style="width:15%">Course Code</th>
                            <th class="d-none d-md-table-cell" style="width:15%">Course Type</th>
                            <th style="width:15%">Course Capacity</th>
                            <th style="width:15%">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->course_code }}</td>
                            <td>{{ $course->course_type }}</td>
                            <td>{{ $course->course_capacity }}</td>
                            <td  class="table-action">
                                <a class="m-2 p-2"  href="#"><i class="align-middle"
                                        data-feather="edit-2"></i></a>
                                <a class="m-2 p-2" href="#"><i class="align-middle"
                                        data-feather="trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>
