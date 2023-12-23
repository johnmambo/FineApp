<div>
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Timelots</h5>
                    <a class="btn btn-sm btn-primary"  href="{{ route('tabler.createTimeslot') }}"><i class="align-inline"
                        data-feather="edit"></i>Add Timeslot</a>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th style="width:30%;">Day</th>
                            <th style="width:25%">Timeslots</th>
                            <th style="width:25%">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slots as $slot)
                        <tr>
                            <td>{{ $slot->id }}</td>
                            <td>{{ $slot->days->day_name }}</td>
                            <td>{{ $slot->start_time }}- {{ $slot->end_time }}</td>
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
