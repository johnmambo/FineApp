<div>
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Units</h5>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.createUnit') }}"><i class="align-inline"
                            data-feather="edit"></i>Add Unit</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th style="width:30%;">Unit Name</th>
                            <th style="width:25%">Unit Code</th>
                            <th style="width:25%">Course Code</th>
                            <th style="width:20%">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($units as $unit)
                            <tr>
                                <td>{{ $unit->id }}</td>
                                <td>{{ $unit->unit_name }}</td>
                                <td>{{ $unit->unit_code }}</td>
                                <td>{{ $unit->courses->course_code }}</td>
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
