<div>
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Departments</h5>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.createDepartment') }}"><i class="align-inline"
                            data-feather="edit"></i>Add Department</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th style="width:50%;">Department Name</th>
                            <th style="width:25%">Department Code</th>

                            <th style="width:20%">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $dep)
                            <tr>
                                <td>{{ $dep->id }}</td>
                                <td>{{ $dep->dep_name }}</td>
                                <td>{{ $dep->dep_code }}</td>

                                <td class="table-action">
                                    <a class="btn btn-sm btn info" href="#">
                                        <i class="align-middle"data-feather="edit"></i></a>
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
