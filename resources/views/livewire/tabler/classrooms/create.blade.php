<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Classroom</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="saveclassroom">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{ __('Room Name') }}</label>
                    <input wire:model="room_name" type="text" name="room_name" id="room_name" class="form-control"
                        value="{{ old('room_name') }}" autofocus>
                    @error('room_name')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Room Type') }}</label>
                    <input wire:model="room_type" type="text" name="room_type" id="room_type" class="form-control"
                        value="{{ old('room_type') }}" autofocus>
                    @error('room_type')
                        <span class="m-3 p-3 block alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ __('Room Capacity') }}</label>
                    <input wire:model="room_capacity" type="text" name="room_capacity" id="room_capacity" class="form-control"
                        value="{{ old('room_capacity') }}" autofocus>
                    @error('room_capacity')
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
