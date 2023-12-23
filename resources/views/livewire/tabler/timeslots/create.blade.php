<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Timeslot</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="savetimeslot">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{ __('Select Day') }}</label>

                    <select wire:model="day_id" class="form-control" name="day_id">
                        <option selected>Open this select menu</option>
                        @foreach ($days as $day)
                            <option value="{{ $day->id }}"> {{ $day->day_name }}</option>
                        @endforeach
                    </select>
                    @error('day_id')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Lesson Start') }}</label>
                    <input wire:model="start_time" type="text" name="start_time" id="start_time" class="form-control"
                        value="{{ old('start_time') }}" autofocus>
                    @error('start_time')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Lesson End') }}</label>
                    <input wire:model="end_time" type="text" name="end_time" id="end_time" class="form-control"
                        value="{{ old('end_time') }}" autofocus>
                    @error('end_time')
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

