<div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Classroom</h5>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="saveday">
                @csrf
                <div class="mb-3">
                    <label class="form-label">{{ __('Day Name') }}</label>
                    <input wire:model="day_name" type="text" name="day_name" id="day_name" class="form-control"
                        value="{{ old('day_name') }}" autofocus>
                    @error('day_name')
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
